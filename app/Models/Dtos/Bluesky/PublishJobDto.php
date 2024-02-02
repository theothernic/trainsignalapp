<?php
    namespace App\Models\Dtos\Bluesky;

    use Bearlovescode\Bluesky\Models\Dtos\Repo\Post;
    use Bearlovescode\Datamodels\Dto\Dto;

    class PublishJobDto extends Dto
    {
        public string $identifer;
        public string $password;
        public Post $post;

    }
