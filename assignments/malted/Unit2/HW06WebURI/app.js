const marvel = {
    render: () => {

        const urlAPI = 'https://gateway.marvel.com:443/v1/public/series?ts=1&apikey=8fce2427382082890bf257fc8f775e21&hash=2209741262f7ba9bfde8b5a5b26f8b9c';
        const container = document.querySelector('#marvel-row');
        let contentHTML = '';

        fetch(urlAPI)
            .then(res => res.json())
            .then(json => {
                for (const serie of json.data.results) {
                    let urlSerie = serie.urls[0].url;
                    contentHTML += `
                    <div class="col-md">
                    <h3 class="title">${serie.title}</h3>
                        <a href="${urlSerie}" target="_blank">
                            <img src="${serie.thumbnail.path}.${serie.thumbnail.extension}" alt="${serie.title}" class="img-thumbnail"> 
                        </a>
                        
                    </div>`;
                }
                container.innerHTML = contentHTML;
            })
    }
};
marvel.render();
/*<h3 class="title">${serie.title}</h3> */