<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       vivifyideas.com
 * @since      1.0.0
 *
 * @package    Zwivel_Medical_Reviewers
 * @subpackage Zwivel_Medical_Reviewers/public/partials
 */
?>

    <!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php if (isset($medicalReviewersCount) && $medicalReviewersCount > 0) : ?>
    <div class="zw-c-section zw-c-medical-reviewers">
        <div class="zw-c-section__header zw-u-text--uppercase">
            <span class="zw-u-text--primary">
                <svg class="zw-c-icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/images/icons.svg#checkmark"></use>
                </svg>
                Medically reviewed by
            </span>
            <?php /* echo $medicalReviewersCount ?> <?php echo ($medicalReviewersCount > 1) ? 'doctors' : 'doctor' */ ?>
        </div>
        <div class="zw-c-section__body">
            <div class="zw-c-reviewers-list">
                <?php foreach($medicalReviewers as $reviewer) : ?>
                    <a class="zw-c-media" href="https://www.zwivel.com/doctor/<?php echo $reviewer->doctor->slug ?>">
                        <div class="zw-c-media__object">
                            <img class="zw-c-avatar zw-c-avatar--md zw-u-img-round" src="https://www.zwivel.com/avatar/<?php echo $reviewer->id ?>" alt="<?php echo $reviewer->doctor->titleFullName ?>" />
                        </div>
                        <div class="zw-c-media__body">
                            <p class="zw-c-media__title"><?php echo $reviewer->doctor->titleFullName ?></p>
                            <?php if (!empty($reviewer->doctor->number_of_reviews) || !empty($reviewer->doctor->number_of_external_reviews)) :?>
                                <p>
                                    <img src="/images/zwivel-sign.svg" class="zw-c-icon" alt="Zwivel Rating">
                                    <?php echo $reviewer->doctor->all_reviews_rating ?>/5
                                </p>
                            <?php endif; ?>
                            <?php if (empty($reviewer->doctor->number_of_reviews) && empty($reviewer->doctor->number_of_external_reviews)) : ?>
                                <p>
                                    <?php echo $reviewer->zip_data->city . ', ' . ($reviewer->is_non_usa ? $reviewer->zip_data->country : $reviewer->zip_data->state_abbr) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>