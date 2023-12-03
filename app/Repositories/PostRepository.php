<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use DB;
use Exception;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version April 19, 2021, 3:28 pm UTC
 */
class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Post::class;
    }

    public function createBlog($input)
    {
        try {
            DB::beginTransaction();

            /** @var \App\Models\Post $blog */
            $input['user_id'] = getLoggedInUserId();
            $blog = $this->create($input);

            if ((isset($input['image']))) {
                $blog->addMedia($input['image'])
                    ->toMediaCollection(Post::PATH, config('app.media_disc'));
            }

            addNotification([
                Notification::BLOG_CREATE,
                User::where('user_type', User::ADMIN)->first()->id,
                Notification::ADMIN,
                getLoggedInUser()->first_name.' '.getLoggedInUser()->last_name.' create a blog.',
            ]);

            DB::commit();

            return $blog;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function updateBlog($input, $blogId): Post
    {
        try {
            DB::beginTransaction();

            /** @var \App\Models\Post $blog */
            $blog = $this->update($input, $blogId);
            if ((isset($input['image']))) {
                $blog->clearMediaCollection(Post::PATH);
                $blog->addMedia($input['image'])
                    ->toMediaCollection(Post::PATH, config('app.media_disc'));
            }

            DB::commit();

            return $blog;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
