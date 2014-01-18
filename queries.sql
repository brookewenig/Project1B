SELECT first, last FROM MovieActor, Actor WHERE (MovieActor.aid = Actor.id AND mid = (SELECT id FROM Movie WHERE title = 'Die Another Day')) ORDER BY first, last; -- tag The inner query searches for the mid of 'Die Another Day', and the outer query matches mid to that query and lists the resulting actors first and last names.

SELECT COUNT(*) as NumMultipleActors FROM(SELECT aid FROM MovieActor GROUP BY aid HAVING COUNT(aid) > 1) alias_name; -- tag The inner query gets aids of the actors who occur in more than one movie. The outer query counts the number of tuples in that relation.

mysql> SELECT title FROM Movie WHERE rating = 'PG-13' AND id IN (SELECT mid From MovieGenre WHERE genre = 'Comedy') ORDER BY title; -- tag The inner query gets the movie ids of all comedy films, and the outer query gets the titles of all PG-13 films.
