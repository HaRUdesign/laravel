<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/flickity.pkgd.min.js') }}" defer></script>
<script src="{{ asset('js/common.js') }}" defer></script>

@if(request()->path()==='home/payment/*')
	<script src="https://js.stripe.com/v3/"></script>
	<script>
			const stripe_public_key = '{{ config('payment.stripe_public_key') }}';
	</script>
	<script src="js/payment.js"></script>
@endif
