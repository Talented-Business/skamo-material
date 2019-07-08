<div class="section_box wall">
    <div class="section_title">
        <h4>1. Beregn vægareal</h4>
    </div>

    <div class="row">
        <div class="ast-col-sm-4">
            <figure>
                <div data-thumb="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/wall.png" data-thumb-alt="" class="woocommerce-product-gallery__image">
                    <a href="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/wall-large.png">
                        <img width="600" height="882" src="<?=plugin_dir_url( SW_PLUGIN_FILE )?>assets/img/wall.png" class="" alt="" title="SkamoWall Smooth spartel (UK)" >
                    </a>
                </div>                
                <figcaption>&nbsp;</figcaption>
            </figure>
        </div>

        <div class="ast-col-sm-8">
            <table class="table" id="walls">
                <tbody>
                    <tr>
                        <td class="bg_none">&nbsp;</td>
                        <td align="center" class="bg_none">Bredde (m)</td>
                        <td align="center" class="bg_none">Højde (m)</td>
                    </tr>
                    <!--Wall 1-->
                    <tr>
                        <td>Væg 1</td>
                        <td><input id="wall_w1_w" type="text"></td>
                        <td><input id="wall_w1_h" type="text"></td>
                    </tr>
                    <!--Wall 2-->
                    <tr>
                        <td>Væg 2</td>
                        <td><input id="wall_w2_w" type="text"></td>
                        <td><input id="wall_w2_h" type="text"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr id="add_wall">
                        <td  class="bg_none">&nbsp;</td>
                        <td class="bg_none" colspan="2" align="right"><button class="btn secondary-button button">Tilføj Væg</button></td>
                    </tr>
                    <!--Result-->
                    <tr>
                        <td align="right" class="bg_none">Areal i alt m²</td>
                        <td class="bg_none" colspan="2"><label class="section_result" id="wall_result">0</label></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>