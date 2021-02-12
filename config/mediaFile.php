<?php
return [
    "MediaTypeServices" => [
        "image" => [
            "extensions" => [
                "png", "jpg", "jpeg"
            ],
            "handler" => \App\Services\Media\ImageFileService::class
        ]
    ]
];
