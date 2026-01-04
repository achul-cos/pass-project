@blaze

@props([
    'dismissible' => null,
    'position' => null,
    'closable' => null,
    'trigger' => null,
    'variant' => null,
    'flyout' => null,
    'name' => null,
])

@php
if ($variant === 'flyout') {
    $flyout = true;
    $variant = null;
}

$closable ??= $variant === 'bare' ? false : true;

if ($flyout) {
    $classes = Flux::classes()
        ->add(match ($variant) {
            default => match($position) {
                'bottom' => 'fixed m-0 p-8 min-w-[100vw] overflow-y-auto mt-auto [--flux-flyout-translate:translateY(50px)] border-t',
                'left' => 'fixed m-0 p-8 max-h-dvh min-h-dvh md:[:where(&)]:min-w-[25rem] overflow-y-auto mr-auto [--flux-flyout-translate:translateX(-50px)] border-e rtl:mr-0 rtl:ml-auto rtl:[--flux-flyout-translate:translateX(50px)]',
                default => 'fixed m-0 p-8 max-h-dvh min-h-dvh md:[:where(&)]:min-w-[25rem] overflow-y-auto ml-auto [--flux-flyout-translate:translateX(50px)] border-s rtl:ml-0 rtl:mr-auto rtl:[--flux-flyout-translate:translateX(-50px)]',
            },
            'floating' => match($position) {
                'bottom' => 'fixed m-2 p-8 min-w-[calc(100vw-1rem)] overflow-y-auto mt-auto [--flux-flyout-translate:translateY(50px)]',
                'left' => 'fixed m-2 p-8 max-h-[calc(100dvh-1rem)] min-h-[calc(100dvh-1rem)] md:[:where(&)]:min-w-[25rem] overflow-y-auto mr-auto [--flux-flyout-translate:translateX(-50px)] rtl:mr-0 rtl:ml-auto rtl:[--flux-flyout-translate:translateX(50px)]',
                default => 'fixed m-2 p-8 max-h-[calc(100dvh-1rem)] min-h-[calc(100dvh-1rem)] md:[:where(&)]:min-w-[25rem] overflow-y-auto ml-auto [--flux-flyout-translate:translateX(50px)] rtl:ml-0 rtl:mr-auto rtl:[--flux-flyout-translate:translateX(-50px)]',
            },
            'bare' => '',
        })
        ->add(match ($variant) {
            default => 'bg-white dark:bg-zinc-800 border-transparent dark:border-zinc-700',
            'floating' => 'bg-white dark:bg-zinc-800 ring ring-black/5 dark:ring-zinc-700 shadow-lg rounded-xl',
            'bare' => 'bg-transparent',
        });
} else {
    $classes = Flux::classes()
        ->add(match ($variant) {
            default => 'p-6 [:where(&)]:max-w-xl [:where(&)]:min-w-xs shadow-lg rounded-xl',
            'bare' => '',
        })
        ->add(match ($variant) {
            default => 'bg-white dark:bg-zinc-800 ring ring-black/5 dark:ring-zinc-700 shadow-lg rounded-xl',
            'bare' => 'bg-transparent',
        });
}

// Support adding the .self modifier to the wire:model directive...
if (($wireModel = $attributes->wire('model')) && $wireModel->directive && ! $wireModel->hasModifier('self')) {
    unset($attributes[$wireModel->directive]);

    $wireModel->directive .= '.self';

    $attributes = $attributes->merge([$wireModel->directive => $wireModel->value]);
}

// Support <flux:modal ... @close="?"> syntax...
if ($attributes['@close'] ?? null) {
    $attributes['wire:close'] = $attributes['@close'];

    unset($attributes['@close']);
}

// Support <flux:modal ... @cancel="?"> syntax...
if ($attributes['@cancel'] ?? null) {
    $attributes['wire:cancel'] = $attributes['@cancel'];

    unset($attributes['@cancel']);
}

if ($dismissible === false) {
    $attributes = $attributes->merge(['disable-click-outside' => '']);
}

[ $styleAttributes, $attributes ] = Flux::splitAttributes($attributes, ['autofocus', 'class', 'style', 'wire:close', 'x-on:close', 'wire:cancel', 'x-on:cancel']);
@endphp

<ui-modal {{ $attributes }} data-flux-modal>
    <?php if ($trigger): ?>
        {{ $trigger }}
    <?php endif; ?>

    <dialog
        wire:ignore.self {{-- This needs to be here because the dialog element adds a "close" attribute that isn't durable... --}}
        {{ $styleAttributes->class($classes) }}
        @if ($name) data-modal="{{ $name }}" @endif
        @if ($flyout) data-flux-flyout @endif
        x-data
        @isset($__livewire)
            x-on:modal-show.document="
                if ($event.detail.name === @js($name) && ($event.detail.scope === @js($__livewire->getId()))) $el.showModal();
                if ($event.detail.name === @js($name) && (! $event.detail.scope)) $el.showModal();
            "
            x-on:modal-close.document="
                if ($event.detail.name === @js($name) && ($event.detail.scope === @js($__livewire->getId()))) $el.close();
                if (! $event.detail.name || ($event.detail.name === @js($name) && (! $event.detail.scope))) $el.close();
            "
        @else
            x-on:modal-show.document="if ($event.detail.name === @js($name) && (! $event.detail.scope)) $el.showModal()"
            x-on:modal-close.document="if (! $event.detail.name || ($event.detail.name === @js($name) && (! $event.detail.scope))) $el.close()"
        @endif
    >
        {{ $slot }}

        <?php if ($closable): ?>
            <div class="absolute top-0 end-0 mt-3 me-4">
                <flux:modal.close>
                    <flux:button aria-label="Close modal" class="p-1 bg-blue/70! rounded-full! border-2 border-black! h-full! active:scale-80! transition-all duration:200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="w-6 h-6 fill-white"><path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/></svg>
                    </flux:button>
                </flux:modal.close>
            </div>
        <?php endif; ?>
    </dialog>
</ui-modal>
