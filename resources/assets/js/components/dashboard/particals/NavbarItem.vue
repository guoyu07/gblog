<template>
	<li @click="changeStyle" :class="liClass">
    	<template v-if="hasChilder">
    		<router-link :to="menuItem.url | filterUrl">
	    		<i :class="'fa ' + menuItem.icon"></i> 
	    		<span class="nav-label">{{ menuItem.name }}</span>
	    		<span :class="'fa ' + parentaclass">{{ iconValue }}</span>
	    	</router-link>
	    	<transition name="fade">
	    	<ul :class="'nav nav-second-level collapse ' + ifShow ">
	    		<li v-for="child in getData">
	    			<router-link :to="child.url">{{ child.name }}</router-link>
	    		</li>
	    	</ul>
	    	</transition>
    	</template>
    	<template v-else>
    		<router-link :to="menuItem.url | filterUrl">
	    		<i :class="'fa ' + menuItem.icon"></i> 
	    		<span class="nav-label">{{ menuItem.name }}</span>
	    	</router-link>
    	</template>
    </li>
</template>

<script>

export default {
	data () {
		return {
			ifShow: '',
			liClass: '',
			parentaclass: ''
		}
	},
	props: {
		menuItem: {
			type: Object,
			default () {
				return {}
			}
		},
		index: {
			type: Number,
			default: 0
		},
		activeIndex: {
			type: Number,
			default: -1
		}
	},
	watch: {
		activeIndex (newIndex) {
			if ((0 | newIndex) === (0 | this.index)) {
				this.liClass ='active'
			    this.ifShow = 'in'
			} else {
				this.liClass = ''
			    this.ifShow = ''
			}
		}
	},
	methods: {
		changeStyle () {
			if ((0 | this.activeIndex) === (0 | this.index)) {
				this.liClass = this.liClass ? '' : 'active'
			    this.ifShow  = this.ifShow ? '' : 'in'
			} else {
				this.$emit('setActive', this.index)
			}
		},
		parentUrl () {
			return this.menuItem.url ? this.menuItem.url : '#'
		},
		hasChilder () {
			let childs = this.menuItem.childs
			if (typeof childs === 'object' 
				&& childs.hasOwnProperty('items') 
				&& childs.items.length > 0
			) {

				this.parentaclass = childs.icon || ''
				return true
			}
			return false
		}
	},
	computed: {
		getData () {
			if (this.hasChilder()) {
				return this.menuItem.childs.items
			}
			return []
		},
		iconValue () {
			if (this.menuItem.childs && this.menuItem.childs.iconValue) {
				return this.menuItem.childs.iconValue
			}
			return ''
		}
	},
	filters: {
		filterUrl (url) {
			if (!url) {
				return '#'
			}
			return url
		}
	}
}

</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-active {
  opacity: 0
}
</style>