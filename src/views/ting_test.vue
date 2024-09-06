<script>
  import { ref } from 'vue';
	import cities from '../data/TwCities.json';

export default {
	setup() {
		const citySelect = ref([]);
		const selected = ref('');
		return { citySelect, cities, selected };
	}
};
</script>

<template>
  <div>
		<v-select
			label="name"
			:reduce="
				(option) => {
					citySelect = option.districts;
					selected =
						option.districts[0] === '臺北市' ? option.districts[0].name : '';
				}
			"
			placeholder="縣市"
			:options="cities"
		></v-select>
	</div>
	<div>
		<v-select
			label="name"
			placeholder="鄉鎮區域"
			v-model="selected"
			:options="citySelect"
		>
		</v-select>
	</div>

</template>




<style lang="scss" scoped>

</style>