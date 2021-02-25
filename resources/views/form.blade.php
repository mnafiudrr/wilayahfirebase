<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body class="antialiased">
        <form action="">
            <div>
                <label for="provinsi">Provinsi</label>
                <select name="provinsi">
                    <option value="" id="provinsi">== Pilih Provinsi ==</option>
                    @foreach( $provinsis as $provinsi )
                    <option value="{{ $provinsi->kode }}" id="provinsi">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="kabupaten">Kabupaten/Kota</label>
                <select name="kabupaten">
                    <option value="" id="kabupaten">== Pilih Kabupaten/Kota ==</option>
                </select>
            </div>
            <div>
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan">
                    <option value="" id="kecamatan">== Pilih Kecamatan ==</option>
                </select>
            </div>
            <div>
                <label for="desa">Desa/Kelurahan</label>
                <select name="desa">
                    <option value="" id="desa">== Pilih Desa/Kelurahan ==</option>
                </select>
            </div>
        </form>
    </body>
    <footer>
        <script>
            $(document).ready(function()
            {
                jQuery('select[name="provinsi"]').on('change',function(){
                    console.log('provinsi kedetek nih');
                    var provinsiID = jQuery(this).val();
                    if(provinsiID)
                    {
                        jQuery.ajax({
                            url : '/kabupaten/'+provinsiID,
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                                $('option[id="kabupaten"]').remove();
                                $('select[name="kabupaten"]').append('<option value="" id="kabupaten">== Pilih Kabupaten ==</option>');
                                $('option[id="kecamatan"]').remove();
                                $('select[name="kecamatan"]').append('<option value="" id="kecamatan">== Pilih kecamatan ==</option>');
                                $('option[id="desa"]').remove();
                                $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                                jQuery.each(data,function(key,value){
                                    $('select[name="kabupaten"]').append('<option value="'+key+'" id="kabupaten">'+value+'</option>');
                                });
                            }
                        });
                    }
                    else
                    {
                        $('option[id="kabupaten"]').remove();
                        $('select[name="kabupaten"]').append('<option value="" id="kabupaten">== Pilih Kabupaten ==</option>');
                        $('option[id="kecamatan"]').remove();
                        $('select[name="kecamatan"]').append('<option value="" id="kecamatan">== Pilih kecamatan ==</option>');
                        $('option[id="desa"]').remove();
                        $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                    }
                });
                jQuery('select[name="kabupaten"]').on('change',function(){
                    console.log('kabupaten berubah nih');
                    var kabupatenID = jQuery(this).val();
                    if(kabupatenID)
                    {
                        jQuery.ajax({
                            url : '/kecamatan/'+kabupatenID,
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                                $('option[id="kecamatan"]').remove();
                                $('select[name="kecamatan"]').append('<option value="" id="kecamatan">== Pilih Kecamatan ==</option>');
                                $('option[id="desa"]').remove();
                                $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                                jQuery.each(data,function(key,value){
                                    $('select[name="kecamatan"]').append('<option value="'+key+'" id="kecamatan">'+value+'</option>');
                                });
                            }
                        });
                    }
                    else
                    {
                        $('option[id="kecamatan"]').remove();
                        $('select[name="kecamatan"]').append('<option value="" id="kecamatan">== Pilih kecamatan ==</option>');
                        $('option[id="desa"]').remove();
                        $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                    }
                });
                jQuery('select[name="kecamatan"]').on('change',function(){
                    console.log('kecamatan berubah nih');
                    var kecamatanID = jQuery(this).val();
                    if(kecamatanID)
                    {
                        jQuery.ajax({
                            url : '/desa/'+kecamatanID,
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                                $('option[id="desa"]').remove();
                                $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                                jQuery.each(data,function(key,value){
                                    $('select[name="desa"]').append('<option value="'+key+'" id="desa">'+value+'</option>');
                                });
                            }
                        });
                    }
                    else
                    {
                        $('option[id="desa"]').remove();
                        $('select[name="desa"]').append('<option value="" id="desa">== Pilih Desa ==</option>');
                    }
                });
            });
        </script>
    </footer>
</html>
