<div class="section_box pluster">
    <div class="section_title">
        <h4>4. Vælg tykkelse og struktur for SkamoWall Plaster</h3>
    </div>
    <div class="row puds"><!--puds-->
        <div class="desc3 ast-col-xs-12">
            <div class="section_content ">
                <div class="section_left">
                    <p>Pudstykkelse (Sæt kryds)</p>
                </div>
            </div>
        </div>
        <div class="section_select row">
            <div class="ast-col-xs-3">
                <div style="width:50px">
                    <?php echo wc_get_gallery_image_html($plaster_smooth->get_image_id())?>
                </div>
            </div>
            <div class="select_keys ast-col-xs-9"> 
                <a href="<?=get_permalink( $plaster_smooth_id )?>" target="_blank">Smooth Plaster</a>
                <br>
                <input id="p1" name="puds" type="radio" value="1" data-product="<?=$plaster_smooth_id?>"> 
                <label for="p1">2 mm</label> 
                <input id="p2" name="puds" type="radio" value="2" checked="checked" data-product="<?=$plaster_smooth_id?>"> 
                <label for="p2">4 mm</label> 
            </div>
        </div>
        <div class="desc3 ast-col-xs-12">
            <div class="section_content ">
                <div class="section_left">
                    <p>eller</p>
                </div>
            </div>
        </div>
        <div class="section_select">
            <div class="ast-col-xs-3">
                <div style="width:50px">
                    <?php echo wc_get_gallery_image_html($plaster_structure->get_image_id())?>
                </div>    
            </div>
            <div class="select_keys ast-col-xs-9"> 
                <a href="<?=get_permalink( $plaster_structure_id )?>" target="_blank">Structural Plaster</a>
                <br>
                <input id="p3" name="puds" type="radio" value="3" data-product="<?=$plaster_structure_id?>"> 
                <label for="p3">2 mm</label> 
                <input id="p4" name="puds" type="radio" value="4" data-product="<?=$plaster_structure_id?>"> 
                <label for="p4">4 mm</label> 
            </div>
        </div>
        <div class="desc3 ast-col-xs-12">
            <div class="section_content ">
                <div class="section_left">
                    <p>Hvis du vælger en pudstykkelse på 4 mm anbefaler vi armeringsnet og beregner det.</p>
                </div>
            </div>
        </div>
    </div>
</div>
