                $(document).ready(function(){
                    const BASEURL = $('#comment').data('id');
                    const id = $('#display_comment').data('id');
                    $('#form_komen').on('submit', function(event){
                        event.preventDefault();
                        var form_data = $(this).serialize();
                        url =  BASEURL + '/tambah-komen/' + id;
                        var name = $('#nama_pengirim').val().length;     
                        var email = $('#email_pengirim').val().length;     
                        var komen = $('#komen').val().length;   
                        if (name == 0) {                
                           $('#nama_pengirim').focus();
                            return false;
                        }else if (email == 0) {                
                           $('#email_pengirim').focus();
                            return false;
                        }else if (komen == 0) {                
                           $('#komen').focus();
                            return false;
                        }    
                        $.ajax({
                            url: url,
                            type:'POST',
                            data:form_data,
                            success:function(data)
                            {
                                $('#form_komen')[0].reset();
                                $('#komentar_id').val('0');
                                load_comment();
                            }
                        });
                    });

                    load_comment();

                    function load_comment()
                    {   
                        url = BASEURL + '/ambil-komen/' + id;
                        
                        $.ajax({
                            url: url,
                            method:"post",
                            success:function(data)
                            {
                                $('#display_comment').html(data);
                            }

                        });

                    }

                    $(document).on('click', '.reply', function(){
                        var komentar_id = $(this).attr("id");
                        $('#komentar_id').val(komentar_id);
                        $('#nama_pengirim').focus();

                    });
                });