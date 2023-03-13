<?php

/**

 * Template part for displaying results in search pages.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package specia

 */

$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta', 'on');

?>
<div class="item" data-post-ID="<?php echo get_the_ID() ?>">

    <div class="d-flex justify-content-between head">

        <a href="<?php the_permalink() ?>">
            <h6 class="title"><?php echo paint_if_exist(get_the_title(get_the_ID())) ?></h6>
        </a>

        <?php foreach (get_the_terms(get_the_ID(), 'status') as $key => $value) : ?>

            <span class="status status-info status-<?php echo paint_if_exist($value->slug) ?>"><?php echo paint_if_exist($value->name) ?></span>

        <?php endforeach; ?>
    </div>

    <div class="content">

        <span class="tag">

            <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g clip-path="url(#clip0_12327_38237)">

                    <path d="M18.75 10.8712H16.875V7.74617C16.8779 7.59995 16.8295 7.45733 16.7382 7.34313C16.6468 7.22893 16.5183 7.15039 16.375 7.12117L3.875 4.62117C3.78421 4.60328 3.69058 4.60577 3.60087 4.62847C3.51116 4.65117 3.42761 4.6935 3.35625 4.75242C3.28291 4.8119 3.224 4.88723 3.18395 4.97275C3.14389 5.05826 3.12374 5.15174 3.125 5.24617V10.8712H1.25C1.08424 10.8712 0.925268 10.937 0.808058 11.0542C0.690848 11.1714 0.625 11.3304 0.625 11.4962V22.7462C0.625 22.9119 0.690848 23.0709 0.808058 23.1881C0.925268 23.3053 1.08424 23.3712 1.25 23.3712H18.75C18.9158 23.3712 19.0747 23.3053 19.1919 23.1881C19.3092 23.0709 19.375 22.9119 19.375 22.7462V11.4962C19.375 11.3304 19.3092 11.1714 19.1919 11.0542C19.0747 10.937 18.9158 10.8712 18.75 10.8712ZM1.875 12.1212H3.125V22.1212H1.875V12.1212ZM4.375 11.4962V6.00867L15.625 8.25867V22.1212H12.5V18.3712C12.5 18.2054 12.4342 18.0464 12.3169 17.9292C12.1997 17.812 12.0408 17.7462 11.875 17.7462H8.125C7.95924 17.7462 7.80027 17.812 7.68306 17.9292C7.56585 18.0464 7.5 18.2054 7.5 18.3712V22.1212H4.375V11.4962ZM8.75 22.1212V18.9962H11.25V22.1212H8.75ZM18.125 22.1212H16.875V12.1212H18.125V22.1212Z" fill="#7E8189" />

                    <path d="M6.5625 12.125H9.0625C9.22826 12.125 9.38723 12.0592 9.50444 11.9419C9.62165 11.8247 9.6875 11.6658 9.6875 11.5V9C9.6875 8.83424 9.62165 8.67527 9.50444 8.55806C9.38723 8.44085 9.22826 8.375 9.0625 8.375H6.5625C6.39674 8.375 6.23777 8.44085 6.12056 8.55806C6.00335 8.67527 5.9375 8.83424 5.9375 9V11.5C5.9375 11.6658 6.00335 11.8247 6.12056 11.9419C6.23777 12.0592 6.39674 12.125 6.5625 12.125ZM7.1875 9.625H8.4375V10.875H7.1875V9.625Z" fill="#7E8189" />

                    <path d="M9.0625 16.5C9.22826 16.5 9.38723 16.4342 9.50444 16.3169C9.62165 16.1997 9.6875 16.0408 9.6875 15.875V13.375C9.6875 13.2092 9.62165 13.0503 9.50444 12.9331C9.38723 12.8158 9.22826 12.75 9.0625 12.75H6.5625C6.39674 12.75 6.23777 12.8158 6.12056 12.9331C6.00335 13.0503 5.9375 13.2092 5.9375 13.375V15.875C5.9375 16.0408 6.00335 16.1997 6.12056 16.3169C6.23777 16.4342 6.39674 16.5 6.5625 16.5H9.0625ZM7.1875 14H8.4375V15.25H7.1875V14Z" fill="#7E8189" />

                    <path d="M10.9375 12.125H13.4375C13.6033 12.125 13.7622 12.0592 13.8794 11.9419C13.9967 11.8247 14.0625 11.6658 14.0625 11.5V9C14.0625 8.83424 13.9967 8.67527 13.8794 8.55806C13.7622 8.44085 13.6033 8.375 13.4375 8.375H10.9375C10.7717 8.375 10.6128 8.44085 10.4956 8.55806C10.3783 8.67527 10.3125 8.83424 10.3125 9V11.5C10.3125 11.6658 10.3783 11.8247 10.4956 11.9419C10.6128 12.0592 10.7717 12.125 10.9375 12.125ZM11.5625 9.625H12.8125V10.875H11.5625V9.625Z" fill="#7E8189" />

                    <path d="M10.9375 16.5H13.4375C13.6033 16.5 13.7622 16.4342 13.8794 16.3169C13.9967 16.1997 14.0625 16.0408 14.0625 15.875V13.375C14.0625 13.2092 13.9967 13.0503 13.8794 12.9331C13.7622 12.8158 13.6033 12.75 13.4375 12.75H10.9375C10.7717 12.75 10.6128 12.8158 10.4956 12.9331C10.3783 13.0503 10.3125 13.2092 10.3125 13.375V15.875C10.3125 16.0408 10.3783 16.1997 10.4956 16.3169C10.6128 16.4342 10.7717 16.5 10.9375 16.5ZM11.5625 14H12.8125V15.25H11.5625V14Z" fill="#7E8189" />

                </g>

                <defs>

                    <clipPath id="clip0_12327_38237">

                        <rect width="20" height="20" fill="white" transform="translate(0 4)" />

                    </clipPath>

                </defs>

            </svg>

            <span class="item-child">

                <strong><?php _e('Bên mời thầu:', POWER) ?></strong>

                <span><?php echo paint_if_exist(get_field('bid_solicitor', get_the_ID())) ?></span>

            </span>

        </span>

        <span class="tag">

            <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M2.5 9C2.5 7.61929 3.61929 6.5 5 6.5H15C16.3807 6.5 17.5 7.61929 17.5 9V19C17.5 20.3807 16.3807 21.5 15 21.5H5C3.61929 21.5 2.5 20.3807 2.5 19V9Z" stroke="#7E8189" stroke-width="1.5" />

                <path d="M2.5 10.6667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />

                <path d="M13.75 5.25L13.75 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M6.25001 5.25L6.25001 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M5.41666 14.0052H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M9.58331 14.0052H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M13.75 14.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M5.41666 17.3411H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M9.58331 17.3411H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M13.75 17.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

            </svg>

            <span class="item-child">

                <strong><?php _e('Phát hành:', POWER) ?></strong>

                <span><?php echo paint_if_exist('Từ ' . date("d/m/Y", strtotime(get_field('release', get_the_ID())))) ?> <?php echo paint_if_exist(' Đến ' . date("d/m/Y", strtotime(get_field('release_end', get_the_ID())))) ?>

                </span></span>

        </span>

        <span class="tag">

            <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M1.66669 11.3594C1.66669 10.2548 2.56212 9.35938 3.66669 9.35938H16.3334C17.4379 9.35938 18.3334 10.2548 18.3334 11.3594V12.157C18.3334 13.0402 17.754 13.8189 16.908 14.0727L11.1494 15.8002C10.3997 16.0252 9.60039 16.0252 8.85063 15.8002L3.09199 14.0727C2.24602 13.8189 1.66669 13.0402 1.66669 12.157V11.3594Z" stroke="#7E8189" stroke-width="1.5" />

                <path d="M10 13.6395L10 12.2109" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M2.36118 13.6406L2.36118 17.4977C2.36118 19.7069 4.15204 21.4977 6.36118 21.4977H13.639C15.8481 21.4977 17.639 19.7069 17.639 17.4977V13.6406" stroke="#7E8189" stroke-width="1.5" />

                <path d="M12.7778 9.35713V8.5C12.7778 7.39543 11.8824 6.5 10.7778 6.5H9.22223C8.11766 6.5 7.22223 7.39543 7.22223 8.5L7.22223 9.35713" stroke="#7E8189" stroke-width="1.5" />

            </svg>

            <span class="item-child">

                <strong><?php _e('Lĩnh vực:', POWER) ?></strong>

                <?php foreach (get_the_terms(get_the_ID(), 'field') as $key => $value) : ?>

                    <span><?php echo paint_if_exist($value->name) ?></span>

                <?php endforeach; ?>

            </span>

        </span>

    </div>

</div>