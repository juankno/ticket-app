<script setup>

const props = defineProps({
	ticket: Object
});
</script>

<template>
	<div class="max-w-sm rounded overflow-hidden shadow-lg">
		<img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
		<div class="px-6 py-4">
			<div class="font-bold text-xl mb-2">{{ ticket.title }}</div>
			<p class="text-gray-700 text-base">
				{{ ticket.description }}
			</p>
		</div>
		<div class="px-6 pt-4 pb-2">
			<span :class="[ticket.status === 'NEW' ?
				'bg-green-100' : 'bg-blue-500',
				'bg-gray-200 inline-block rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2']">
				#{{ ticket.status }}</span>
		</div>
	</div>
</template>