<script src="{{ asset('app/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('app/js/crum-mega-menu.js') }}"></script>
<script src="{{ asset('app/js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('app/js/theme-plugins.js') }}"></script>
<script src="{{ asset('app/js/main.js') }}"></script>
<script src="{{ asset('app/js/form-actions.js') }}"></script>

<script src="{{ asset('app/js/velocity.min.js') }}"></script>
<script src="{{ asset('app/js/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('app/js/animation.velocity.min.js') }}"></script>

<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif

    @if(Session::has('info'))
        toastr.info('{{ Session::get('info') }}');
    @endif
</script>