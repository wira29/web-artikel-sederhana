<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Dashboard\Article\StoreRequest;
use App\Http\Requests\Dashboard\Article\UpdateRequest;
use App\Models\Article;
use App\Traits\UploadTrait;

class ArticleService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    /**
     * Handle store data event to models.
     *
     * @param StoreRequest $request
     *
     * @return array|bool
     */
    public function store(StoreRequest $request): array|bool
    {
        $data = $request->validated();

        return [
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'photo' => $this->upload(UploadDiskEnum::ARTICLES->value, $request->file('photo')),
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return array|bool
     */

    public function update(UpdateRequest $request, Article $article): array|bool
    {
        $data = $request->validated();

        $photo = $article->photo;

        if ($request->hasFile('photo')) {
            $this->remove($photo);
            $photo = $this->upload(UploadDiskEnum::ARTICLES->value, $request->file('photo'));
        }

        return [
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'photo' => $photo,
        ];
    }
}
