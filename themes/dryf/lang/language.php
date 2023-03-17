<?php 
    if (get_locale() == 'uk') {
        /* page id*/
        $about_us_page_id = 222;
        $about_us_page_url = get_permalink($about_us_page_id);
        $article_page_id = 277;
        $article_page_url = get_permalink($article_page_id);
        $blog_page_id = 318;
        $blog_page_url = get_permalink($blog_page_id);
        $contact_page_id = 67;
        $contact_page_url = get_permalink($contact_page_id);
        $employer_page_id = 252;
        $employer_page_url = get_permalink($employer_page_id);
        $home_page_id = 15;
        $home_page_url = get_permalink($home_page_id);
        $our_team_page_id = 313;
        $our_team_page_url = get_permalink($our_team_page_id);
        $vacancies_page_id = 337;
        $vacancies_page_url = get_permalink($vacancies_page_id);
        $vacancy_page_id = 175;
        $vacancy_page_url = get_permalink($vacancy_page_id);

        /* text */
        /* button */
        $button_text = 'Замовити дзвінок';
        $call_form_text = 'Заповнити форму';
        $text_more = 'Дізнатися більше';
        $send_request = 'Надіслати заявку';
        $send_request2 = 'Надіслати запит';
        $respond = 'Відгукнутись на вакнсію';
        $reed_more = 'Читати більше';
        $copy_link = 'Копіювати посилання на статтю';
        $more_employees = 'Більше працівників';
        $offer_job = 'Запропонувати роботу';
        $show_more_vacancies = 'Показати всі вакансії';
        $find_vacancy = 'Знайти вакансію для себе';
        $classify_vacancies = 'Сортувати вакансії';
        $show_filters = 'Показати фільтри';

        /* Title */
        $about_section_title = 'Розповімо детальніше про нашу компанію';

        /* Pages navigation */
        $about_us_page_name = 'Про нас';
        $blog_page_name = 'Блог';
        $contact_page_name = 'Наші контакти';
        $employer_page_name = 'Роботодавцю';
        $home_page_name = 'Головна';
        $our_team_page_name = 'Наша команда';
        $vacancies_page_name = 'Вакансії';

        /* Other text */
        $social_title = 'Ми в соц.мережах:';

    }
    if (get_locale() == 'pl_PL') {
        $contact_page_id = 67;
    }
    if (get_locale() == 'en_GB') {
        $contact_page_id = 67;
    }
    if (get_locale() == 'ru_RU') {
        $contact_page_id = 67;
    }
?>