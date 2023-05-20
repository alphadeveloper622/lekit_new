@if(addon_is_activated('ai_writer'))
    <div class="ai_btn_page">
        <a href="javascript:void(0)" data-url="{{ route('ai.content') }}" class="ai_writer d-block text-right" data-name="{{ $name }}"
           data-length="{{ $length }}" data-topic="{{ $topic }}" data-extra_query="{{ isset($long_description) ? 1 : '' }}">
            <span class="a_writer_text">{{ __('use_ai_writer_to_generate_content') }}</span>
            <span class="a_writer_loader d-none"><i class="bx bx-loader"></i></span>
        </a>

        <a href="{{ route('ai-writer.config') }}" class="text-right btn-press" target="_blank">{{ __('Click Here to Write with your own idea') }}</a>
    </div>
@endif