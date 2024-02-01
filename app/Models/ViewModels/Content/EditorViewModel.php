<?php
    namespace App\Models\ViewModels\Content;

    use App\Models\Content;
    use App\Models\Dtos\ContentDto;
    use App\Models\ViewModels\AuthenticatedPageViewModel;
    use Bearlovescode\Datamodels\View\PageViewModel;

    class EditorViewModel extends AuthenticatedPageViewModel
    {
        public ?int $replyTo = null;

        public ?ContentDto $content = null;

        public function __construct(mixed $data = null)
        {
            parent::__construct($data);

            $this->contentTypes = Content::TYPES;
            $this->contentFormats = Content::FORMATS;
            $this->contentVisibility = Content::VISIBILITY;
        }
    }
