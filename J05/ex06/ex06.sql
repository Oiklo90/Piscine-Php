SELECT title, summary
FROM film
WHERE LOWER(title) LIKE '%vincent%' OR LOWER(summary) LIKE '%vincent%'
ORDER BY id_film ASC;
