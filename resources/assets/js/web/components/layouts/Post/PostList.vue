<template>
    <div>
        <template v-for="post in posts">
            <div class="card card--post mt0 mb3">
                <div class="post__image">
                    <a href="/performant-laravel">
                        <img src="https://i0.wp.com/wp.laravel-news.com/wp-content/uploads/2017/06/performant-laravel.jpg?resize=1400%2C709" alt="Learn how to Improve the performance of your Laravel app with Performant Laravel">
                    </a>
                </div>
                <div class="post__content truncate">
                    <span class="label">News
                        <span class="text--gray"> / </span>
                        <span class="text--gray">June 14, 2017</span>
                    </span>
                    <h2 class=""><a href="/performant-laravel">Learn how to Improve the performance of your Laravel app with Performant Laravel</a></h2>
                    <p>Performant Laravel is a new free video course created by Chris Fidao that covers quick performance wins you can implement right now into your Laravel apps.</p>
                    <p>The course includes 12 videos that range from three minutes up to twenty minutes, which makes them the perfect size for binge watching during your breaks. </p>
                    <a class="truncate__link" href="/performant-laravel">Read more&hellip;</a>
                </div>
                <div class="post__footer">
                    <div class="post__author">
                        <img class="author__image" src="https://www.gravatar.com/avatar/0e7b6742f9d7e1a8a213d74b429b9e8f?s=130">
                        <div class="author__content">
                            <h4 class="author__name">by <a href="/@ericlbarnes">Eric L. Barnes</a></h4>
                            <ul class="author__links">
                                <li><span class="twitter"><a href="https://twitter.com/ericlbarnes" rel="nofollow"></a></span></li>
                                <li><span class="facebook"><a href="https://facebook.com/ebarnes" rel="nofollow"></a></span></li>
                                <li><span class="github"><a href="https://github.com/ericbarnes" rel="nofollow"></a></span></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="tags">
                        <li class="tag"><a href="#" class="tag__link">Wocao</a></li>
                    </ul>
                </div>
            </div>
        </template>

        <nav class="pagination">
            <a href="" class="pagination__arrow arrow--left btn--disabled"><svg class="pagination__icon"><use xlink:href="#icon-arrow-left"></use></svg> Newer Posts</a>
            <a href="https://laravel-news.com/blog?page=2" class="pagination__arrow arrow--right ">Older Posts <svg class="pagination__icon"><use xlink:href="#icon-arrow-right"></use></svg></a>
        </nav>
    </div>
</template>

<script>
    import Pagination from './../'
    const data = {
        api: {
            list: ''
        },
        posts: [{},{}]
    }

    export default {
        data () {
            return data
        },
        props: {
            limit: {
                type: Number,
                default: 0
            }
        }
    }
</script>