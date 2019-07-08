<script>
(function($){
    "use strict";
    $(document).ready(function() {
        //general
        var s1areal, s2areal, s3areal,s2areal_deep,s3areal_deep;
        var plate_conversion_rate = 0.58;
        //dimensions
        var wall1_hw,wall1_lw,wall2_hw,wall2_lw,wall3_hw,wall3_lw,wall4_hw,wall4_lw,wall5_hw,wall5_lw;
        var win1_l, win1_w, win2_l, win2_w, win3_l, win3_w;
        var door1_l, door1_w, door2_l, door2_w, door3_l, door3_w;
        let extra_percent = 3;
        //start values
      	$(".struc-2mm").hide();
        $('#walls input').val('');
        $('#windows_yes input').val('');
        $("#window_deep").val(0);
        $('#door_yes input').val('');
        $("#door_deep").val(0);
        $('#b2').prop("checked", true);
        $('#p2').prop("checked", true);
        $('#protox_quantity').val(0);
        $('input[name^="products"]').each(function(){
            if(this.dataset.quantity!=undefined)this.value = this.dataset.quantity;
        })
        $("input[name$='windows']").click(function() {
            var test1 = $(this).val();
            $("div.desc1").hide();
            $("#Win" + test1).show();
            if(test1 == 2){
                $("#Win1 :input").val('');
            }
            calculate();
        });
        $("input[name$='doors']").click(function() {
            var test2 = $(this).val();
            $("div.desc2").hide();
            $("#Door" + test2).show();
            if(test2 == 2){
                $("#Door1 :input").val('');
            }
            calculate();
        });

        //Plade
        $('#PladeThickness').text(50);
        $('input[name=board]').click(function(){
            $('#PladeThickness').text($('input[name=board]:checked').val());
            sek2();
            sek3();
            calculate();
        });

      	//plaster
		$("input[name$='puds']").click(function() {
            let plasher = $(this).val();
            $(".puds-2mm").show();
            $(".puds-4mm").hide();

            $(".struc-2mm").hide();
            $(".struc-4mm").hide();

            $("#Puds" + plasher).show();
            if(plasher == 2){
              $("#Puds1 :input").val('');
              $(".puds-2mm").hide();
              $(".puds-4mm").show();

              $(".struc-2mm").hide();
              $(".struc-4mm").hide();
            }
          	if(plasher == 3){
              $(".puds-2mm").hide();
              $(".puds-4mm").hide();

              $(".struc-2mm").show();
              $(".struc-4mm").hide();
          	}
          	if(plasher == 4){
              $(".puds-2mm").hide();
              $(".puds-4mm").hide();

              $(".struc-2mm").hide();
              $(".struc-4mm").show();
          	}
            calculate();
        });


        //changes
        $('.wall input').change(function() {
            sek1();
        });
        $('.window input').change(function() {
            sek2();
        });
        $('.door input').change(function() {
            sek3();
        });
        $('#add_wall button').click(function(){
            let length = $("#walls tbody tr").length;
            $("#walls tbody").append(function(){
                return $(`<tr><td>Væg ${length}</td><td><input id="wall_w${length}_w" type="text"></td><td><input id="wall_w${length}_h" type="text"></td></tr>`).change(sek1);
            });
        });
        $('#add_window button').click(function(){
            let length = $("#windows_yes tbody tr").length;
            $("#windows_yes tbody").append(function(){
                return $(`<tr><td>Vindue ${length}</td><td><input id="s2_w${length}_w" type="text"></td><td><input id="s2_w${length}_h" type="text"></td></tr>`).change(sek2);
            });
        });
        $('#add_door button').click(function(){
            let length = $("#door_yes tbody tr").length;
            $("#door_yes tbody").append(function(){
                return $(`<tr><td>Dør ${length}</td><td><input id="s3_d${length}_w" type="text"></td><td><input id="s3_d${length}_h" type="text"></td></tr>`).change(sek3);
            });
        });
        $('#protox_quantity').change(function(){
            let digits = [5,2.5];
            let product_id = $(this).data('product');
            let quantities = [0,0];
            quantities[0] = Math.floor(this.value/digits[0]);
            let remainder = this.value%digits[0];
            quantities[1] = Math.floor(remainder/digits[1]);
            $(".protox_variation_quantity").each(function(){
                if(this.dataset.size==digits[0]){
                    this.value = quantities[0];
                }
                if(this.dataset.size==digits[1]){
                    this.value = quantities[1];
                }
            });
        });
        // Sektion 1
        var sek1 = function() {
            var init = function() {
                let total = 0;
                $('#walls tbody tr').each(function(){
                    let width = 0;
                    if($('input:eq(0)',this).val() != undefined) width = Number($('input:eq(0)',this).val().replace(",","."));
                    let height = 0;
                    if($('input:eq(1)',this).val() != undefined)height = Number($('input:eq(1)',this).val().replace(",","."));
                    total = total + width*height;
                })
                s1areal = total;
              	var value = toFixedIfNecessary(total,2);
                $('#wall_result').text(value.toString().replace(".",","));
            };
            init();
            calculate();
        },
        sek2 = function() {
            var init = function() {
                let total = 0,length = 0;
                $('#windows_yes tbody tr').each(function(){
                    let width = 0;
                    if($('input:eq(0)',this).val() != undefined) width = Number($('input:eq(0)',this).val().replace(",","."));
                    let height = 0;
                    if($('input:eq(1)',this).val() != undefined)height = Number($('input:eq(1)',this).val().replace(",","."));
                    total = total + width*height;
                    length = length+ width+height;
                })
                s2areal = total;
              	var value = toFixedIfNecessary(total,2);
                $('#s2_result').text(value.toString().replace(".",","));
                let thick = parseInt($('input[name=board]:checked').val());
                let deep = parseInt($('#window_deep').val());
                let rate = 2;
                if(deep+thick/10+1<30) rate = 0.5;
                else if(deep+thick/10+1<60) rate = 1;
                else if(deep+thick/10+1<90)rate = 1.5;
                if(deep == 0) rate = 0;
                s2areal_deep = rate*length;
                value = toFixedIfNecessary(Math.ceil(s2areal_deep/plate_conversion_rate* ((100+extra_percent)/100)),2);
                $('#s2_result_deep').text(value.toString().replace(".",","));
            };
            init();
            calculate();
        },
        sek3 = function() {
            var init = function() {
                let total = 0,length = 0;
                $('#door_yes tbody tr').each(function(){
                    let width = 0;
                    if($('input:eq(0)',this).val() != undefined) width = Number($('input:eq(0)',this).val().replace(",","."));
                    let height = 0;
                    if($('input:eq(1)',this).val() != undefined)height = Number($('input:eq(1)',this).val().replace(",","."));
                    total = total + width*height;
                    length = length+ width+height;
                })
                s3areal = total;
              	var value = toFixedIfNecessary(total,2);
                $('#s3_result').text(value.toString().replace(".",","));
                let thick = parseInt($('input[name=board]:checked').val());
                let deep = parseInt($('#door_deep').val());
                let rate = 2;
                if(deep+thick/10+1<30) rate = 0.5;
                else if(deep+thick/10+1<60) rate = 1;
                else if(deep+thick/10+1<90)rate = 1.5;
                if(deep == 0) rate = 0;
                s3areal_deep = rate*length;
                value = toFixedIfNecessary(Math.ceil(s3areal_deep/plate_conversion_rate* ((100+extra_percent)/100)),2);
                $('#s3_result_deep').text(value.toString().replace(".",","));
            };
            init();
            calculate();
        },
        //calculate areal
        calculate_areal = function(){
            var total_areal = s1areal || 0;
            [s2areal,s3areal].forEach(function(i) {
                if(i !== undefined){
                    total_areal -= i;
                }
            }, this);
            return total_areal;
        },
        //calculate radio values
        calculate_radio_val = function(data){
            var val = 0;
            switch(data) {
                case 25:
                    val = 6.9;
                    break;
                case 30:
                    val = 8;
                    break;
              	case 40:
                    val = 9;
                    break;
                case 50:
                    val = 13.7;
                    break;
                default:
                    val = 27.5;
            }
            return val;
        },
        //get DB number
        getDBno = function(data, section){
            var val = 0;
            switch(data) {
                case 6.9:
                    val = 1919297;
                    break;
                case 13.7:
                    val = 1919310;
                    break;
                default:
                    val = 1919870;
            }
            return val;
        },
        //get item number
        getItemno = function(data){
            var val = 0;
            switch(data) {
                case 6.9:
                    val = 22706004;
                    break;
                case 8:
                    val = 22706005;
                    break;
              case 9:
                    val = 22706016;
                    break;
                case 13.7:
                    val = 22706006;
                    break;
                default:
                    val = 22706007;
            }
            return val;
        },
        //result - plade
        plade = function(data){// board count
            let cal_val = calculate_radio_val(Number($('input[name=board]:checked').val()));
            let width = $('input[name=board]:checked').val()
            let deep = s2areal_deep,amount,variation_id,product_id;
            if(deep==undefined)deep = 0;
            /*if(isNaN(s3areal_deep)==false)deep +=s3areal_deep;
            if(width==25){
                deep = data+deep;
                data = 0;
            }*/
            let window_quantity = Math.ceil(s2areal_deep/plate_conversion_rate* ((100+extra_percent)/100));
            let door_quantity = Math.ceil(s3areal_deep/plate_conversion_rate* ((100+extra_percent)/100));
            if(deep>0 && width!=25){
                if($("#plade_tr_25").hasClass("hidden"))$("#plade_tr_25").removeClass("hidden");
                amount = 0;
                if(isNaN(window_quantity)==false)amount +=window_quantity;
                if(isNaN(door_quantity)==false)amount +=door_quantity;
                $('#result_sp_11').text(amount);
                $('#result_sp_21').text(Math.round(amount));
                $('#result_sp_31').text(getItemno(25));
                $('#result_sp_41').text(getDBno(25));
                variation_id = $("input#b1").data('id');
                product_id = $("input#b1").data('product');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][id]" value="'+product_id+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][quantity]" value="'+Math.round(amount)+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][variation_id]" value="'+variation_id+'">');
            }else{
                if(!$("#plade_tr_25").hasClass("hidden"))$("#plade_tr_25").addClass("hidden");
            }
            if(data>0){
                if($("#plade_tr").hasClass("hidden"))$("#plade_tr").removeClass("hidden");
                amount = Math.ceil((data / plate_conversion_rate) * ((100+extra_percent)/100));
                if(width==25){
                    if(isNaN(window_quantity)==false)amount +=window_quantity;
                    if(isNaN(door_quantity)==false)amount +=door_quantity;
                }    
                $('#result_sp_1').text(amount);
                $('#result_sp_2').text(Math.round(amount));
                $('#result_sp_3').text(getItemno(cal_val));
                $('#result_sp_4').text(getDBno(cal_val));
                variation_id = $("input[name='board']:checked").data('id');
                product_id = $("input[name='board']:checked").data('product');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][id]" value="'+product_id+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][quantity]" value="'+Math.round(amount)+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+variation_id+'][variation_id]" value="'+variation_id+'">');
            }else{
                if(!$("#plade_tr").hasClass("hidden"))$("#plade_tr").addClass("hidden");
            }
        },
        //result - klaeb - DK only
        adhesive = function(data){//SkamoWall Adhesive (UK)
          	//***25 kg sække***
            //var comsumption = data / 8.33; //Rækkeevne 3 m2 per sæk
            //$('#result_k_1_dk').text(Math.ceil(comsumption * ((100+5)/100)));
            //$('#result_k_2_dk').text(Math.ceil((data * 0.14) * ((100+5)/100)) * 25);
            //$('#result_k_3_dk').text(672003);
            //$('#result_k_4_dk').text(1920117);

          	//***20 kg sække***
            var comsumption = data; //Rækkeevne 5 m2 per sæk - 4 kg per m2
            if(isNaN(s2areal_deep)==false)comsumption += s2areal_deep;
            if(isNaN(s3areal_deep)==false)comsumption +=s3areal_deep;
            let conversion_rate = 5;
            let number = Math.ceil(comsumption * ((100+extra_percent)/100)/conversion_rate);
            $('#result_k_1_dk').text(number);
            $('#result_k_2_dk').text(Math.ceil((data * 0.14) * ((100+extra_percent)/100)) );
            $('#result_k_3_dk').text(672009);
            $('#result_k_4_dk').text(1943134);
            let product_id = $("#adhesive").data('product');
            $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][id]" value="'+product_id+'">');
            $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][quantity]" value="'+number+'">');
        },
        //result - klaeb
        klaeb = function(data){
            var comsumption = data / 8.33; //Rækkeevne 3 m2 per sæk
            $('#result_k_1').text(Math.ceil(comsumption * ((100+extra_percent)/100)));
            $('#result_k_2').text(Math.ceil((data * 0.14) * ((100+5)/100)) * 25);
            $('#result_k_3').text(672003); //før: 672009
            $('#result_k_4').text(1920117); //før: 1943134
        },
        //result - puds1 2mm
        puds1 = function(data){
            if(isNaN(s2areal_deep)==false)data += s2areal_deep;
            if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
          	var consumption = data / 7.5; //Rækkeevne 15 m2 per sæk
            var total = Math.ceil(consumption * ((100+10)/100));
            $('#result_p_1').text(total);
            $('#result_p_2').text(Math.ceil(total * 15));
          	//DK
            $('#result_p_3').text(672010);
            $('#result_p_4').text(1943135);
        },
        //result - puds2 4mm
        puds2 = function(data){
            if(isNaN(s2areal_deep)==false)data += s2areal_deep;
            if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
            var consumption = data / 3.75;
            var total = Math.ceil(consumption * ((100+10)/100));
            $('#result_p2_1').text(total);
            $('#result_p2_2').text(Math.ceil(total * 20));
            //DK
          	$('#result_p2_3').text(672010);
            $('#result_p2_4').text(1943135);
        },
        //result - puds3 2mm
        puds3 = function(data){
            if(isNaN(s2areal_deep)==false)data += s2areal_deep;
            if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
          	var consumption = data / 7.5; //Rækkeevne 18 m2 per sæk
            var total = Math.ceil(consumption * ((100+extra_percent)/100));
            $('#result_stpl_1').text(total);
            $('#result_stpl_2').text(Math.ceil(total * 18));
        },
        //result - puds4 4mm
        puds4 = function(data){
            if(isNaN(s2areal_deep)==false)data += s2areal_deep;
            if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
            var consumption = data / 3.75;
            var total = Math.ceil(consumption * ((100+extra_percent)/100));
            $('#result_stpl2_1').text(total);
            $('#result_stpl2_2').text(Math.ceil(total * 90));
            $('#result_stpl2_3').text(672002);
            $('#result_stpl2_4').text(1920116);
        },
        //check radio
        pubs = function(data){
            let value = $("input[name='puds']:checked").val();
            let conversion_rate;
            let local_extra_percent = extra_percent;
            switch(value){
                case "1":
                    conversion_rate = 7.5;
                    local_extra_percent = 10;
                    break;
                case "2":
                    conversion_rate = 7.5/2;
                    local_extra_percent = 10;
                    break;
                case "3":
                    conversion_rate = 7.5;
                    break;
                case "4":
                conversion_rate = 7.5/2;
                    break;
            }
            if(isNaN(s2areal_deep)==false)data += s2areal_deep;
            if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
            let consumption = data;
            let number = Math.ceil(consumption * ((100+local_extra_percent)/100)/conversion_rate);
            let product_id = $("input[name='puds']:checked").data('product');
            $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][id]" value="'+product_id+'">');
            $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][quantity]" value="'+number+'">');
            mesh(data, value);
        },
        mesh = function(data, v){
            let consumption = data;
            let conversion_rate = 45;
            let number = Math.ceil(consumption * ((100+extra_percent)/100)/conversion_rate);
            let product_id = $("#mesh").data('product');
            if(v==1 || v == 3)$("#mesh").css('display','none');
            else{
                $("#mesh").css('display','table-row');
                $('#result_mepl_1').text(number);
                $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][id]" value="'+product_id+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][quantity]" value="'+number+'">');
            }
        },
        //result - primer 10 L bcl (50 - 99.99)
        primers = function(data){
            if(data){

                /*if(data > 49.99){
                    $('#result_pr_row').css("display","none");
                    $("#result_prs_row").css("display","table-row");
                    $("#result_prs_1r").removeClass("noBB");
                    if(data < 99.99){
                        data = 1;
                        $("#result_pr3_row").css("display","table-row");
                        $("#result_pr_row").css("display", "none");
                        $("#result_prs_1r").addClass("noBB");
                    }
                }
                else{
                    $('#result_pr_row').css("display", "table-row");
                    $("#result_prs_row").css("display","none");
                    $("#result_pr3_row").css("display","none");
                    $("#result_prs_1r").removeClass("noBB");
                }*/
                if(isNaN(s2areal_deep)==false)data += s2areal_deep;
                if(isNaN(s3areal_deep)==false)data +=s3areal_deep;
                let conversion_rate = 10*5;
                let number = Math.ceil((data/conversion_rate) * ((100+extra_percent)/100));
                $('#result_prs_1').text(number);
                //$('#result_prs_2').text("<");
                //$('#result_prs_3').text(672004);
                //$('#result_prs_4').text(1920118);
                let product_id = $("#result_prs_row").data('product');
                $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][id]" value="'+product_id+'">');
                $('.dynamic_products').append('<input type="hidden" name="products['+product_id+'][quantity]" value="'+number+'">');
            }
        },
        calculate = function(click=false){
            //clear
            $("#result_pr3_row").css("display","none");
            $('.dynamic_products').html('');
            //get calculate areal
            let areal_data = calculate_areal();
            if(areal_data>0&&click){
                $(".section_box.result").removeClass("hidden");
                resize()
            }
            //results
          	var value = toFixedIfNecessary(areal_data,2);
            $('#total_areal').text(value.toString().replace(".",","));
            $('#total_areal_print').text(value.toString().replace(".",","));

            plade(areal_data);
            adhesive(areal_data);
            puds1(areal_data);
            puds2(areal_data);
          	puds3(areal_data);
            puds4(areal_data);
            pubs(areal_data);
            primers(areal_data);
        },
        resize = function(){
            if($(".section_box.result").hasClass("hidden")==false&&false){
                if(parseInt($(".videoWrapper").css('width'))>1100)$(".videoWrapper").css('margin-top','950px');
                else if (parseInt($(".videoWrapper").css('width'))>900)$(".videoWrapper").css('margin-top','1000px');
                else if (parseInt($(".videoWrapper").css('width'))>700)$(".videoWrapper").css('margin-top','1100px');
                else if (parseInt($(".videoWrapper").css('width'))>600)$(".videoWrapper").css('margin-top','1150px');
                else if (parseInt($(".videoWrapper").css('width'))>500)$(".videoWrapper").css('margin-top','1350px');
                else $(".videoWrapper").css('margin-top','1527px');
            }
        }
        ;
        window.onresize = function(event) {
            resize();
        }
        $('#calBtn').click(function() {
            calculate(true);
        });

        function toFixedIfNecessary(value, dp) {
            return +parseFloat(value).toFixed(dp);
        };
    });
})(jQuery);
</script>
