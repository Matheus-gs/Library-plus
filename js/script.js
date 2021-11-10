// Feather Icons
feather.replace()
//

// Navbar current link
function highlightCurrent() {
  const curPage = document.URL
  const links = document.getElementsByTagName('a')

  for (let link of links) {
    if (link.href == curPage) {
      link.classList.add('current-link')
    }
  }
}

document.onreadystatechange = () => {
  document.readyState === 'complete' ? highlightCurrent() : ''
}
