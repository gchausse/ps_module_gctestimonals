<!-- Block mymodule -->

Welcome on Testimonials!

{foreach from=$testimonials  item=testimonial}
<div style="border:1px solid black; margin:1em" onmouseover="this.style.background='silver'" onmouseout="this.style.background='white'">
    <a href="{$testimonials_link}?id={$testimonial.id_testimonials}">
        <ul>
            <li><h3>Name:{$testimonial.testimonials_name}</h3></li>
            <li><p>Description:{$testimonial.testimonials_description|truncate:25:"...":true:false}</p></li>
            <li><p>Date:{$testimonial.date_testimonials}</p></li>
        </ul>
    </a>
</div>
{/foreach}


<!-- /Block mymodule -->