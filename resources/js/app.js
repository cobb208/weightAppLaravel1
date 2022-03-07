require('./bootstrap');


const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuButton = document.getElementById('mobile-menu-button');
if(mobileMenu && mobileMenuButton)
{
    mobileMenuToggle(mobileMenu, mobileMenuButton);
}

const userMenu = document.getElementById('user-menu');
const userMenuButton = document.getElementById('user-menu-button');

if(userMenu && userMenuButton)
{
    mobileMenuToggle(userMenu, userMenuButton);

    let isOverMenu = false;

    userMenu.addEventListener('mouseover', function() {
        isOverMenu = true;
    });

    userMenu.addEventListener('mouseleave', function() {
        if(isOverMenu)
        {
            setTimeout(function() {
                userMenu.classList.add('hidden');
                isOverMenu = false;
            }, 500);
        }
    });



}

function mobileMenuToggle(mobileMenuHtmlElement, mobileMenuHtmlButton)
{
    mobileMenuHtmlButton.addEventListener('click', function()
    {
        if(mobileMenuHtmlElement.classList.contains('hidden'))
        {
            mobileMenuHtmlElement.classList.remove('hidden');
        } else
        {
            mobileMenuHtmlElement.classList.add('hidden');
        }
    });
}
