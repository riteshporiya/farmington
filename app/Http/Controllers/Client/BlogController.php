<?php

namespace App\Http\Controllers\Client;

use App\DataTables\PostDataTable;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;

class BlogController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new PostDataTable())->get())->make(true);
        }
    
        return view('client.posts.index');
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $isEdit = false;
        
        return view('client.posts.create', compact('isEdit'));
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();

        $this->postRepository->createBlog($input);

        Flash::success('Blog saved successfully.');

        return redirect(route('user.blogs.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Post not found');

            return redirect(route('user.posts.index'));
        }

        return view('client.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param  int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $blog = $this->postRepository->find($id);

        if (empty($blog)) {
            Flash::error('Blog not found');

            return redirect(route('user.blogs.index'));
        }

        return view('client.posts.edit')->with('blog', $blog);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param  int              $id
     * @param UpdatePostRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Blog not found');

            return redirect(route('user.blogs.index'));
        }

        $post = $this->postRepository->updateBlog($request->all(), $id);

        Flash::success('Blog updated successfully.');

        return redirect(route('user.blogs.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $blog = $this->postRepository->find($id);

        $blog->delete();

        return $this->sendSuccess('Blog deleted successfully.');
    }

    /**
     * @param $id
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function status($id): \Illuminate\Http\JsonResponse
    {
        /** @var \App\Models\Post $blog */
        $blog = $this->postRepository->find($id);

        if (empty($blog)) {
            return $this->sendSuccess('Blog not found.');
        }
        $blog->update(['is_active' => ! $blog->is_active]);

        return $this->sendSuccess('Status updated successfully.');
    }
}
