<script>
window.onload = function() {
	document.querySelectorAll('.language-katex').forEach(function (element) {katex.render(element.innerHTML, element.parentNode.parentNode, {throwOnError: false});});
}
</script>