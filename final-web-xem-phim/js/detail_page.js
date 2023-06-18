const tabHeader = document.querySelector('.tab-header'),
	tabContent = document.querySelector('.tab-content')

function tabClicked(element) {
	let activedElement = tabHeader.querySelector('.active')
	let activedTab = tabContent.querySelector('.active')
	let elementName = element.getAttribute('name')
	let displayTab = tabContent.querySelector(`#${elementName}`)

	activedElement.classList.remove('active')
	activedTab.classList.remove('active')
	element.classList.add('active')
	displayTab.classList.add('active')
}
