<script type="text/javascript">
	$('#searchHere').on('keyup',function(){
		$value=$(this).val();
		$.ajax({
			type : 'get',
			url : '{{URL::to('/search')}}',
			data:{'search':$value},
			success:function(data){
			  console.log(data);
			}
		});
	})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>