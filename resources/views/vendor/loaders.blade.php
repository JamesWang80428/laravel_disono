@if(isset($after_load))
    @if($after_load === true)
        <script>
            [
                @foreach($scripts as $script)
                    '{!! asset($script) . url_ext() !!}',
                @endforeach
            ].forEach(function (src) {
                var script = document.createElement('script');
                script.src = src;
                script.async = false;
                document.head.appendChild(script);
            });

            if (typeof appScriptLoader == 'function') {
                appScriptLoader();
            }
        </script>
    @endif
@else
    @section('javascript')
        <script>
            function appScriptLoader() {
                [
                    @foreach($scripts as $script)
                        '{!! asset($script) . url_ext() !!}',
                    @endforeach
                ].forEach(function (src) {
                    var script = document.createElement('script');
                    script.src = src;
                    script.async = false;
                    document.head.appendChild(script);
                });
            }
        </script>
    @endsection
@endif