<?php


namespace foonoo\plugins\contrib\lazy_load_images;

use foonoo\events\ContentOutputGenerated;
use foonoo\Plugin;
use foonoo\events\AssetPipelineReady;

class LazyLoadImagesPlugin extends Plugin
{
    public function getEvents()
    {
        return [
            ContentOutputGenerated::class => [$this, 'modifyImageTags'],
            AssetPipelineReady::class => function(AssetPipelineReady $event) {
                $pipeline = $event->getAssetPipeline();
                $pipeline->addJavascript(__DIR__ . "/assets/lazy_load.js");
                $pipeline->addStylesheet(__DIR__ . "/assets/lazy_load.css");
            }
        ];
    }

    public function modifyImageTags(ContentOutputGenerated $event)
    {
        try{
            $dom = $event->getDOM();
        } catch (\TypeError $e) {
            return;
        }
    }
}
