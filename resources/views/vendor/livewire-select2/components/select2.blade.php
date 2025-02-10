<div wire:ignore>
    <select class="select2-{{$this->id}} {{$this->class ?? ''}}" @if($this->multiple) multiple="multiple" @endif >
        <option></option>
        @foreach($this->options as $key => $option)
            @if (is_array($this->model))
                <option value="{{$key}}" @if(in_array($key, $this->model)) selected @endif>{{$option}}</option>
            @else
                <option value="{{$key}}" @if($key == $this->model) selected @endif>{{$option}}</option>
            @endif
        @endforeach
    </select>
</div>

@script
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            prepareSelect2();
        });

        document.addEventListener('livewire-select2-init', function() {
            prepareSelect2();
        });

        function prepareSelect2(){
            $('.select2-{{$this->id}}').select2({
                width: '100%',
                allowClear: true,
                placeholder: '',
            })
            .off()
            .on('change', function(e) {
                var data = $(this).select2('val');
                @this.select2Change(data);
            });
        }
    </script>
@endscript
