


select especie,cast( 100 * count(*) / sum(count(*)) over () as decimal(10,2)) AS abundancia from herpetofauna group by especie;
