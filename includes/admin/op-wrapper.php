<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
    <h2>WPCKAN -  A plugin for integrating CKAN and WP</h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <div class="handlediv" title="Click to toggle"><br></div>
                        <!-- Toggle -->

                        <h2 class="hndle"><span>Lets Get started</span>
                        </h2>

                        <div class="inside">
                            <form method="post" action="">

                                <input type="hidden" name="ckan_form_submitted" value="Y">

                                <table class="form-table">
                                    <tr valign="top">
                                        <td scope="row"><label for="tablecell">URL</label></td>

                                        <td><input name="ckan_url" id="ckan_url" type="text" value=""
                                                   class="regular-text"/>
                                            <p class="description"><?php _e('Fill in your  CKAN_API_ENDPOINT') ?>.</p></td>
                                    </tr>
                                    <tr valign="top">
                                        <td scope="row"><label for="tablecell">API Key</label></td>
                                        <td><input name="ckan_apikey" id="ckan_apikey" type="text" value=""
                                                   class="regular-text"/>
                                            <p class="description"><?php _e('Fill in your API-key available under the profile page of your CKAN user account') ?>.</p>
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    <input class="button-primary" type="submit" name="ckan_form_submit" value="Save"/>
                                </p>
                            </form>

                        </div>
                    </div>
                        </div>


                        <!-- .postbox -->
                        <div class="postbox">

                            <div class="handlediv" title="Click to toggle"><br></div>
                            <!-- Toggle -->

                            <h2 class="handle"><span></span>
                            </h2>

                            <div class="inside">
                                <p>Below are the datasets</p>
                                <ul class="ckan">

                                    <?php for ($i = 0; $i < 2; $i++): ?>
                                    <li>
                                        <ul>
                                            <?php if (count($ckan_results->{'response'}->{'docs'}[$i]->{'multimedia'}) > 0): ?>
                                            <li>
                                                <img width="120px"
                                                     src=" <?php echo 'https://demo.ckan.org/'.
                                                     $ckan_results->{'response'}->{'docs'}[0]->{'multimedia'}[1]->{'url'} ?>">
                                            </li>
                                            <?php endif; ?>

                                            <li class="ckan-name">
                                                <a href="<?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'web_url'}; ?>">
                                                    <?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'headline'}->{'main'}; ?>
                                                </a>
                                            </li>

                                            <li class="ckan-paragraph">
                                                <p><?php echo $ckan_results->{'response'}->{'docs'}[$i]->{'lead_paragraph'}; ?></p>
                                            </li>

                                        </ul>
                                    </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>

                <!-- .postbox -->
                <div class="postbox">

                    <div class="handlediv" title="Click to toggle"><br></div>
                    <!-- Toggle -->

                    <h2 class="hndle"><span>JSON Feed</h2>

                    <div class="inside">
                        <p>
                            <?php echo $ckan_results->{'response'}->{'docs'}[0]->{'web_url'}; ?>
                        </p>
                        <p>
                            <?php echo $ckan_results->{'response'}->{'docs'}[0]->{'headline'}->{'main'}; ?>
                        </p>
                        <p>
                            <?php echo $ckan_results->{'response'}->{'docs'}[0]->{'multimedia'}[1]->{'url'}; ?>
                        </p>
                        <p>
                            <?php echo $ckan_results->{'response'}->{'docs'}[0]->{'lead_paragraph'}; ?>
                        </p>


                        <pre><code><?php var_dump($ckan_results); ?></code></pre>
                    </div>
                    <!-- .inside -->

                </div>
            </div>
            <!-- .meta-box-sortables .ui-sortable -->

        </div>
        <!-- post-body-content -->

        <!-- .postbox --->
        <div id="postbox-container-1" class="postbox-container">

            <div class="meta-box-sortables">
                <?php if (isset($ckan_url) && $ckan_url != '') ; ?>
                <div class="postbox">
                    <div class="handlediv" title="Click to toggle"><br></div>

                    <h2 class="handle"><span>Settings</span></h2>

                    <div class="inside">


                        <form method="post" action="">
                            <input type="hidden" name="ckan_form_submitted" value="Y">
                            <p>
                                <input name="ckan_url" type="text" id="ckan_url" value="<?php echo $ckan_url; ?>"
                                       class="all-options"/>

                            </p>
                            <p>
                                <input name="ckan_apikey" type="text" id="ckan_apikey" value="<?php echo $ckan_apikey; ?>"
                                       class="all-options"/>

                            </p>

                            <input class="button-primary" type="submit" name="ckan_form_submit" value="update">
                        </form>
                    </div>
                </div>
                