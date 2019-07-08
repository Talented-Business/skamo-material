<div class="section_content door"><!--døre-->
    <div class="section_select  above">Døre (Sæt kryds) 
        <span class="select_keys"> 
            <input checked="checked" id="d1" name="doors" type="radio" value="1"> 
            <label for="d1">Ja</label> 
            <input id="d2" name="doors" type="radio" value="2"> 
            <label for="d2">Nej</label> 
        </span>
    </div>

    <div class="desc2" id="Door1">
        <div class="row">
            <div class="ast-col-sm-4">
                <figure>
                    <div data-thumb="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/door.png" data-thumb-alt="" class="woocommerce-product-gallery__image">
                        <a href="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/door-large.png">
                            <img src="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/door.png" class="" alt="" title=""  style="width:265px;height:215px">
                        </a>
                    </div>                
                    <figcaption>Indsæt bredde, højde og dybde af dørhullet. Dermed trækker vi det fra vægarealet og beregner lysningsplader i 25 mm.</figcaption>
                </figure>
            </div>

            <div class="ast-col-sm-8">
                <table id="door_yes">
                    <tbody>
                        <tr>
                            <td class="bg_none">&nbsp;</td>
                            <td align="center" class="bg_none">Bredde (m)</td>
                            <td align="center" class="bg_none">Højde (m)</td>
                        </tr>
                        <!--Door 1-->
                        <tr>
                            <td>Dør 1</td>
                            <td><input id="s3_d1_w" type="text"></td>
                            <td><input id="s3_d1_h" type="text"></td>
                        </tr>
                        <!--Door 2-->
                        <tr>
                            <td>Dør 2</td>
                            <td><input id="s3_d2_w" type="text"></td>
                            <td><input id="s3_d2_h" type="text"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr id="add_door">
                            <td class="bg_none" colspan="3" align="right"><label for="door_deep">Dybde cm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" min=0 id="door_deep" value="0" style="width:65px;"><button class="btn secondary-button button">Tilføj dør</button></td>
                        </tr>
                        <!--Result-->
                        <tr>
                            <td align="right" class="bg_none">Areal i alt m²</td>
                            <td class="bg_none" colspan="2"><label class="section_result" id="s3_result">0</label></td>
                        </tr>
                        <!--Deep-->
                        <tr>
                            <td align="right" class="bg_none">Antal lysningsplader</td>
                            <td class="bg_none" colspan="2"><label class="section_result" id="s3_result_deep">0</label></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="desc2" id="Door2" style="display: none;">&nbsp;</div>
    </div>
</div>
