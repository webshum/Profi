<div class="subscribe">
    <div class="center grid grid-cols-2 !py-[105px]">
        <div class="content pr-[130px]">
            <div class="relative z-10">
                @if(!empty(get_field('title_form_subscribe', 'options')))
                    <h2 class="title animated">
                        {!! get_field('title_form_subscribe', 'options') !!}
                    </h2>
                @endif

                @if(!empty(get_field('subtitle_form_subscribe', 'options')))
                    <p class="mt-[20px] animated">
                        {!! get_field('subtitle_form_subscribe', 'options') !!}
                    </p>
                @endif
            </div>
        </div>

        <form action="#" class="form-subscribe pl-[130px]" name="subscribe">
            <div class="relative z-10">
                <label class="field-input">
                    <div class="label">{{ __('Ім\'я', 'sage') }}</div>
                    <input type="text" name="name" placeholder="{{ __('Ваше ім\'я', 'sage') }}" required>
                </label>

                <label class="field-input">
                    <div class="label">{{ __('Тел.', 'sage') }}</div>
                    <input type="tel" name="tel" required placeholder="{{ __('Ваше тел.', 'sage') }}">
                </label>

                <button type="submit" class="button">{{ __('Відправити', 'sage') }}</button>
            </div>
        </form>
    </div>
</div>
