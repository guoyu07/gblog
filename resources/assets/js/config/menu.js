export default [
    {
        name: '控制面板',
        icon: 'fa-th-large',
        url: '/dashboard/home'
    },
    {
        name: '分类管理',
        icon: 'fa-diamond',
        url: '/dashboard/category'
    },
    {
        name: '资源管理',
        icon: 'fa-diamond',
        url: '/dashboard/storage'
    },
    {
        name: '文章管理',
        icon: 'fa-envelope',
        childs: {
            icon: 'label label-warning pull-right',
            iconValue: '16/24',
            items: [
                {
                    url: '/dashboard/publish',
                    name: '发布文章'
                },
                {
                    url: '/dashboard/articles',
                    name: '文章列表'
                }
            ]
        }
    }
]
