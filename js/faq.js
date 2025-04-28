const faqs = JSON.parse(content);

const container = document.getElementById('FAQs');

faqs.forEach(faq => {

    const oneFAQ = document.createElement('div');
    oneFAQ.className = 'oneFAQ';

    const buttonWrapper = document.createElement('div');
    buttonWrapper.className = 'buttonWrapper';

    const button = document.createElement('button');
    button.className = 'collapsible';
    button.textContent = faq.title;

    const description = document.createElement('p');
    description.textContent = faq.description;

    buttonWrapper.appendChild(button);
    buttonWrapper.appendChild(description);
    oneFAQ.appendChild(buttonWrapper);
    container.appendChild(oneFAQ);
});


var coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {

  coll[i].addEventListener("click", function() {

    this.classList.toggle("active");
  });
}