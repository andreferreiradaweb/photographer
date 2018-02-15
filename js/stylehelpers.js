        function SolicitarBonus() {
                            $('.form').submit(function() {
                                $('.loading').html("<center><img src='loading.gif' width='45'></center>");
                                $.ajax({
                                    url: 'send-form.php',
                                    crossDomain: true,
                                    type: 'POST',
                                    data: $('.form').serialize(),
                                    success: function(data) {
                                        $('.mostrar').html(data);
                                        $('.loading').hide();
                                        $('.form')[0].reset();

                                    }
                                });
                                return false;
                            }
                        };