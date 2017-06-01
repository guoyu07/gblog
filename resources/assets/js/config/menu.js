export default [
	{
		name: 'Dashboards',
		icon: 'fa-th-large',
		childs: {
			icon: 'arrow',
			items: [
				{
					url: 'index.html',
					name: 'test'
				}
			]
		}
	},
	{
		name: 'Category',
		icon: 'fa-diamond',
		url: '/dashboard/category'
	},
	{
		name: 'Storage',
		icon: 'fa-diamond',
		url: '/dashboard/storage'
	},
	{
		name: 'Graphs',
		icon: 'fa-bar-chart-o',
		childs: {
			icon: 'arrow',
			items: [
				{
					url: '/dashboard/test',
					name: 'sssss'
				},
				{
					url: 'index.html',
					name: 'test'
				}
			]
		}
	},
	{
		name: 'Article',
		icon: 'fa-envelope',
		childs: {
			icon: 'label label-warning pull-right',
			iconValue: '16/24',
			items: [
				{
					url: '/dashboard/a/publish',
					name: 'publish'
				},
				{
					url: '/dashboard/a',
					name: 'dasdadad'
				}
			]
		}
	},
	{
		name: 'Metrics',
		icon: 'fa-pie-chart',
		url: '/dashboard/home'
	},
	{
		name: 'Widgets',
		icon: 'fa-flask',
		url: '/dashboard/home'
	},
	{
		name: 'Forms',
		icon: 'fa-edit',
		childs: {
			icon: 'arrow',
			items: [
				{
					url: 'index.html',
					name: 'test'
				},
				{
					url: 'index.html',
					name: 'test'
				},
				{
					url: 'index.html',
					name: 'test'
				}
			]
		}
	},
	{
		name: 'App Views',
		icon: 'fa-desktop',
		childs: {
			icon: 'pull-right label label-primary',
			iconValue: 'SPECIAL',
			items: [
				{
					url: 'index.html',
					name: 'test'
				},
				{
					url: 'index.html',
					name: 'test'
				},
				{
					url: 'index.html',
					name: 'test'
				}
			]
		}
	}
]
