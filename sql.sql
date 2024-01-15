-- Sales_Tracker_Reference.dbo.TBL_TBASE definition

-- Drop table

-- DROP TABLE Sales_Tracker_Reference.dbo.TBL_TBASE;

CREATE TABLE dbo.TBL_TBASE (
	BAS_NID int IDENTITY(1,1) NOT NULL,
	BAS_NORDEN varchar(255) NOT NULL,
	BAS_NCOD_ABONO varchar(255) NOT NULL,
	BAS_CDONANTE varchar(255) 
	BAS_NCOD_CLIENTE varchar(255) 
	BAS_NIDENTIFICACION_CLIENTE varchar(255) NOT NULL,
	BAS_CESTADOPORT varchar(255) 
	BAS_NPORTIN_MSISDN varchar(255) NOT NULL,
	BAS_NORIGINAL_MSISDN varchar(255) NOT NULL,
	BAS_DFECHAREGISTRO varchar(255) NOT NULL,
	BAS_NHORAREGISTRO varchar(255) 
	BAS_DFECHAVENTANA varchar(255) NOT NULL,
	BAS_NHORAVENTANA varchar(255) NOT NULL,
	BAS_NOFERTA varchar(255) NOT NULL,
	BAS_COFERTADESC varchar(255) 
	BAS_NVALORRENTAMENSUAL varchar(255) NOT NULL,
	BAS_NCANAL varchar(255) NOT NULL,
	BAS_CCANALDESC varchar(255) 
	BAS_NCANALVENTA varchar(255) NOT NULL,
	BAS_CCANALVENTADESC varchar(255) 
	BAS_CUSUARIOVENTA varchar(255) 
	BAS_CVENDEDORDESC varchar(255) 
	BAS_NCODIGOVENDEDOR varchar(255) NOT NULL,
	BAS_NPUNTOCD varchar(255) NOT NULL,
	BAS_CPUNTODESC varchar(255) 
	BAS_CTIPOPUNTO varchar(255) 
	BAS_CGRANSUPERFICIEDESC varchar(255) 
	BAS_NAGENTECD varchar(255) NOT NULL,
	BAS_CAGENTEDESC varchar(255) 
	BAS_CREGCOMDESC varchar(255) 
	BAS_CPROVDESC varchar(255) 
	BAS_CCIUDADDESC varchar(255) 
	BAS_CTIPOORIGEN varchar(255) 
	BAS_CREMARK varchar(255) 
	BAS_NN_RESERVA1 varchar(255) NOT NULL,
	BAS_NN_RESERVA2 varchar(255) NOT NULL,
	BAS_NCOD_PLAN varchar(255) NOT NULL,
	BAS_CTIPO_PAGO varchar(255) 
	BAS_NPORT_ID varchar(255) NOT NULL,
	BAS_CPRODUCTO varchar(255) 
	BAS_NDIA_VENTANA varchar(255) NOT NULL,
	BAS_NCICLO_FACTURACION varchar(255) NOT NULL,
	BAS_NCICLO_CORRECTO varchar(255) NOT NULL,
	BAS_CASIGNACION_CICLO varchar(255) 
	BAS_NDIFERENCIA varchar(255) NOT NULL,
	BAS_NDIFERENCIA1 varchar(255) 
	BAS_DFECHA_CANCELACION varchar(255) NULL,
	BAS_CBIZ_CODE varchar(255) 
	BAS_CEMPLOYEE_CODE varchar(255) 
	BAS_CEMPLOYEE_NAME varchar(255) 
	BAS_CORG_NAME_ACTUAL varchar(255) 
	BAS_CEX_FIELD1 varchar(255) 
	BAS_CADDR_8 varchar(255) 
	BAS_CADDR_9 varchar(255) 
	BAS_CADDR_12 varchar(255) 
	BAS_CTIPOPORTABILIDAD varchar(255) 
	BAS_CRECEPTOR varchar(255) 
	BAS_NCARGOBASICO varchar(255) NOT NULL,
	BAS_CFUENTE varchar(255) 
	BAS_CFLAG_BONO varchar(255) 
	BAS_CTENENCIA_CLIENTE varchar(255) 
	BAS_CTENENCIA_HOUSE_HOLD varchar(255) 
	BAS_CPORT_IN_RESPONSE_DESC varchar(255) 
	BAS_DFECHAINICIOESTADOPETICION varchar(255) NULL,
	BAS_CTIPOOPERACIONPETICIONDESC varchar(255) 
	BAS_CESTADOULTIMOQUIEBREDESC varchar(255) 
	BAS_CMOTIVOULTIMOQUIEBREDESC varchar(255) 
	BAS_CESTADO_ULT_ACTIVIDAD_DESC varchar(255) 
	BAS_CCAMPANA varchar(255) 
	BAS_CFLAG_PCO varchar(255) 
	BAS_POTCONVERGENCIALDB2C varchar(255) 
	BAS_CSEGMENTO varchar(255) 
	BAS_CESTADOTRANSP varchar(255) 
	BAS_DFECHAULTIMOESTADOTRANSP varchar(255) NULL,
	BAS_CULTIMAACLARACIONNOVEDADTRANSP varchar(255) 
	CONSTRAINT PK_TBL_TBASE_3214EC2727737FFD PRIMARY KEY (BAS_NID, BAS_NORDEN)
);