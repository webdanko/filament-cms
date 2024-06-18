<?php

namespace TomatoPHP\FilamentCms;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TomatoPHP\FilamentCms\Filament\Pages\Themes;
use TomatoPHP\FilamentCms\Filament\Resources\CategoryResource;
use TomatoPHP\FilamentCms\Filament\Resources\PostResource;
use TomatoPHP\FilamentCms\Livewire\BuilderToolbar;
use TomatoPHP\FilamentCms\Livewire\BuilderToolbarForm;
use TomatoPHP\FilamentCms\Livewire\BuilderToolbarHeader;


class FilamentCMSPlugin implements Plugin
{
    public bool $allowUrlImport = true;
    public bool $allowBehanceImport = false;
    public bool $allowGitHubImport = true;
    public bool $allowYoutubeImport = false;
    public bool $allowExport = true;
    public bool $allowImport = true;
    public bool $useThemeManager = false;
    public bool $usePageBuilder = false;

    public function getId(): string
    {
        return 'filament-cms';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            CategoryResource::class,
            PostResource::class,
        ]);

        if($this->useThemeManager){
            $panel->pages([
                Themes::class
            ]);
        }

        if($this->usePageBuilder){
            $panel->livewireComponents([
                BuilderToolbar::class,
            ]);
        }
    }

    public function useThemeManager(bool $useThemeManager=true): static
    {
        $this->useThemeManager = $useThemeManager;
        return $this;
    }

    public function usePageBuilder(bool $usePageBuilder=true): static
    {
        $this->usePageBuilder = $usePageBuilder;
        return $this;
    }


    public function allowExport(bool $allowExport = true): static
    {
        $this->allowExport = $allowExport;
        return $this;
    }

    public function allowImport(bool $allowImport = true): static
    {
        $this->allowImport = $allowImport;
        return $this;
    }


    public function allowUrlImport(bool $allowUrlImport = true): static
    {
        $this->allowUrlImport = $allowUrlImport;
        return $this;
    }

    public function allowBehanceImport(bool $allowBehanceImport = true): static
    {
        $this->allowBehanceImport = $allowBehanceImport;
        return $this;
    }

    public function allowGitHubImport(bool $allowBehanceImport = true): static
    {
        $this->allowGitHubImport = $allowBehanceImport;
        return $this;
    }

    public function allowYoutubeImport(bool $allowYoutubeImport = true): static
    {
        $this->allowYoutubeImport = $allowYoutubeImport;
        return $this;
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }
}
