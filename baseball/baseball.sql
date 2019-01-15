SELECT * FROM winlose;
SELECT team, win FROM winlose;
SELECT player FROM batter WHERE hit >= 100;
SELECT player(team?), win, lose FROM winlose WHERE win > lose;
SELECT player FROM pitcher WHERE lose > win;
SELECT player, team, league FROM batter JOIN winlose ON batter.team = winlose.team;

SELECT team, player, homerun FROM batter WHERE homerun >= 30;
SELECT player , team, hit/dasuu FROM batter WHERE hit/dasuu >= 0.3 AND fourball >= 20;
SELECT MAX(deadball) FROM batter;
SELECT team, SUM(homerun) FROM batter GROUP BY team;
SELECT AVG(hit) FROM batter WHERE player like '%石%';


SELECT item.movie_title, AVG(data.rating) FROM item JOIN data ON data.item_id = item.movie_id GROUP BY data.item_id;