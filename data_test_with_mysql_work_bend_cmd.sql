## to get the data from the game_type_provider table with the provider table and game_types table (with the help of the join command) ##
## laravel query builder
one to many relationship
##
SELECT
    gt.id AS game_type_id,
    gt.code AS game_type_code,
    gt.description AS game_type_description,
    p.id AS provider_id,
    p.p_code AS provider_code,
    p.description AS provider_description
FROM
    slot_casino.game_types AS gt
JOIN slot_casino.game_type_provider AS gtp ON gt.id = gtp.game_type_id
JOIN slot_casino.providers AS p ON gtp.provider_id = p.id;
