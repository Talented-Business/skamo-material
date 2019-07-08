<div class="section_content window"><!--vinduer-->
    <div class="section_select above">Vinduer (Sæt kryds) 
        <span class="select_keys"> 
            <input checked="checked" id="w1" name="windows" type="radio" value="1"> 
            <label for="w1">Ja</label> 
            <input id="w2" name="windows" type="radio" value="2"> 
            <label for="w2">Nej</label> 
        </span>
    </div>

    <div class="desc1" id="Win1">
        <div class="row ">
            <div class="ast-col-sm-4">
                <figure>
                    <div data-thumb="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/window.png" data-thumb-alt="" class="woocommerce-product-gallery__image">
                        <a href="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/window-large.png">
                            <img src="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/window.png" class="" alt="" title=""  style="width:265px;height:255px">
                        </a>
                    </div>                
                    <figcaption>Indsæt bredde, højde og dybde af murhullet. Dermed trækker vi det fra vægarealet og beregner lysningsplader i 25 mm.</figcaption>
                </figure>
            </div>

            <div class="ast-col-sm-8">
                <div class="window_box" id="windows_yes">
                    <table>
                        <tbody>
                            <tr>
                                <td class="bg_none">&nbsp;</td>
                                <td align="center" class="bg_none">Bredde (m)</td>
                                <td align="center" class="bg_none">Højde (m)</td>
                            </tr>
            <!--Window 1--> <tr>
                                <td>Vindue 1</td>
                                <td><input id="s2_w1_w" type="text"></td>
                                <td><input id="s2_w1_h" type="text"></td>
                            </tr>
            <!--Window 2--> <tr>
                                <td>Vindue 2</td>
                                <td><input id="s2_w2_w" type="text"></td>
                                <td><input id="s2_w2_h" type="text"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr id="add_window">
                                <td class="bg_none" colspan="3" align="right"><label for="window_deep">Dybde cm</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" min=0 id="window_deep" value="0" style="width:65px"><button class="btn secondary-button button">Tilføj Vindue</button></td>
                            </tr>

                            <!--Result-->
                            <tr>
                                <td align="right" class="bg_none">Areal i alt m²</td>
                                <td class="bg_none" colspan="2"><label class="section_result" id="s2_result">0</label></td>
                            </tr>
                            <!--Deep-->
                            <tr>
                                <td align="right" class="bg_none">Antal lysningsplader</td>
                                <td class="bg_none" colspan="2"><label class="section_result" id="s2_result_deep">0</label></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="desc1" id="Win2" style="display: none;">&nbsp;</div>
</div>