 function valid(o,w)
{
    o.value = o.value.replace(valid.r[w],''); 
}
valid.r = { 'numbers':/[^\d]/g }
function valid(o,w)
{
    o.value = o.value.replace(valid.r[w],''); 
}
valid.r = { 'numbers':/[^\d]/g }
