<?php
/*Template Name: contact page*/
get_header() ?>
<section class="map-secton">
    <div class="container-fluid">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2446.7304903215772!2d21.07875531615297!3d52.175593379750495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47192d53c5da8c63%3A0x939f1942ca63e611!2sHusarii%2070%2C%2002-951%20Warszawa!5e0!3m2!1sru!2spl!4v1644332270059!5m2!1sru!2spl"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
<section class="contact-form__full">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2><?php echo pll__('Find Us') ?></h2>
                <h4><?php bloginfo('name') ?></h4>
                <p><strong><?php echo pll__('Address') ?></strong> <?php echo get_option('adreess') ?></p>
                <p><strong><?php echo pll__('Phone') ?></strong> <?php echo get_option('phone') ?></p>
                <p><strong><?php echo pll__('Viber') ?></strong> <?php echo get_option('phone') ?></p>
                <p><strong><?php echo pll__('E-mail') ?></strong> <?php bloginfo('admin_email') ?></p>
                <p><strong><?php echo pll__('NIP') ?></strong> 5272961762</p>
                <p><strong><?php echo pll__('KRS') ?></strong> 0000906863</p>
                <p><strong><?php echo pll__('REGION') ?></strong> 38923988600000</p>


            </div>
            <div class="col-lg-8">
                <div class="card card-outline-secondary border-0 transperent">
                    <h2><?php echo pll__('Feedback Form:') ?></h2>
                    <div class="card-body">
                        <form action="#" method="post" class="form" role="form" >
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <input class="form-control field" name="custom_user_form[name]" type="text" value="" placeholder="<?php echo pll__('Name')?>">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control field" type="text" value="" name="custom_user_form[company]" placeholder="<?php echo pll__('Company')?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <input class="form-control field" type="number" name="custom_user_form[phone]" value="" placeholder="<?php echo pll__('Phone')?>">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control field" type="text" name="custom_user_form[fax]" value="" placeholder="<?php echo pll__('Fax')?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <input class="form-control field" type="email" name="custom_user_form[mail]" value="" placeholder="<?php echo pll__('E-mail')?>">
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control field" type="text" name="custom_user_form[address]" value="" placeholder="<?php echo pll__('Address')?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <select class="form-control field" name="custom_user_form[typeDel]">
                                        <option value="Enquiry">
                                            Enquiry
                                        </option>
                                        <option value="General Feedback">
                                            General Feedback
                                        </option>
                                        <option value="Suggestions">
                                            Suggestions
                                        </option>
                                        <option value="Other">
                                            Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control field" type="text" value="" name="custom_user_form[country]" placeholder="<?php echo pll__('Country')?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <textarea class="w-100" name="custom_user_form[message]" placeholder="<?php echo pll__('Message')?>"></textarea>
                                </div>
                            </div>
                            <input name="custom_user_form[typePage]" type="hidden" value="<?php the_title()?>">
                            <input type="submit" class="btn btn-readmore" value="<?php pll_e('Submit')?>">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
