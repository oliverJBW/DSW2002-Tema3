const CONTAINER = document.querySelector('main div');

CONTAINER.innerHTML = '';

DATA.forEach(company => {
  console.log(company);
  let content = `
    <section class="col-6 container px-4 py-5  border">
    <div class="row">
      <img src="img/${company.logo}" alt="${company.company}" class="col text-center" />
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
  `;

  
  company.employees.forEach(employee => {
    console.log(employee); 
    content += `
    <div class="col">
      <div class="card text-dark bg-light m-3" onclick="selectCard(this)">
        
        <div class="card-header">
          ${employee.id}
          <button type="button" class="btn-close float-end" aria-label="Close"
            onclick="removeCard(this)"></button>
        </div>
        <div class="card-body">
          <h5 class="card-title">${employee.fullname}</h5>
          <p class="card-subtitle">${employee.mail}</p>
          <p class="card-text">${employee.phone}</p>
        </div>
      </div>
    </div>
    ` 
  })
  content += `
    </div>
    </section>
  `;
  CONTAINER.innerHTML += content;
});

function selectCard(card) {
  card.classList.toggle('bg-warning');
  card.classList.toggle('bg-light');
}

function removeCard(card) {
  card.parentElement.parentElement.parentElement.remove()
}