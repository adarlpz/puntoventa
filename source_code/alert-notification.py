from apikey import TOKEN,SERVICE_ID,NUMERO_TELEFONO, NUMERO_TELEFONO2, NUMERO_TELEFONO3

import clx.xms
import requests
import json

client = clx.xms.Client(service_plan_id=SERVICE_ID,token=TOKEN)

create = clx.xms.api.MtBatchTextSmsCreate()
create.sender = NUMERO_TELEFONO
create.recipients = {NUMERO_TELEFONO, NUMERO_TELEFONO2, NUMERO_TELEFONO3}
create.body = "Hola soy banquitooooooooo"

try:
    batch = client.create_batch(create)
except (requests.exceptions.RequestsException,clx.xms.exceptions.ApiException) as ex:
    print('Failed to communicate with XMS: %s' % str(ex))