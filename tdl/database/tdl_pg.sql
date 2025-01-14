PGDMP  )                    |            dbtdl    16.3    16.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16397    dbtdl    DATABASE     ~   CREATE DATABASE dbtdl WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Philippines.1252';
    DROP DATABASE dbtdl;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                pg_database_owner    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   pg_database_owner    false    4            �            1259    16408    tbCateg    TABLE     �   CREATE TABLE public."tbCateg" (
    "catID" smallint NOT NULL,
    "categDesc" text NOT NULL,
    "isActive" smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public."tbCateg";
       public         heap    postgres    false    4            �            1259    16417    tbstatus    TABLE     �   CREATE TABLE public.tbstatus (
    "statID" smallint NOT NULL,
    "statDesc" text NOT NULL,
    "isActive" smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.tbstatus;
       public         heap    postgres    false    4            �            1259    16416    tbstatus_statID_seq    SEQUENCE     �   CREATE SEQUENCE public."tbstatus_statID_seq"
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public."tbstatus_statID_seq";
       public          postgres    false    219    4            �           0    0    tbstatus_statID_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public."tbstatus_statID_seq" OWNED BY public.tbstatus."statID";
          public          postgres    false    218            �            1259    16399    tbtdl    TABLE     �   CREATE TABLE public.tbtdl (
    "tdlID" bigint NOT NULL,
    "tdDesc" text NOT NULL,
    "Sdate" date NOT NULL,
    "Edate" date NOT NULL,
    "statID" smallint NOT NULL,
    "catID" smallint NOT NULL
);
    DROP TABLE public.tbtdl;
       public         heap    postgres    false    4            �            1259    16398    tbtdl_tdlID_seq    SEQUENCE     z   CREATE SEQUENCE public."tbtdl_tdlID_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public."tbtdl_tdlID_seq";
       public          postgres    false    216    4            �           0    0    tbtdl_tdlID_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public."tbtdl_tdlID_seq" OWNED BY public.tbtdl."tdlID";
          public          postgres    false    215            [           2604    16420    tbstatus statID    DEFAULT     v   ALTER TABLE ONLY public.tbstatus ALTER COLUMN "statID" SET DEFAULT nextval('public."tbstatus_statID_seq"'::regclass);
 @   ALTER TABLE public.tbstatus ALTER COLUMN "statID" DROP DEFAULT;
       public          postgres    false    218    219    219            Y           2604    16402    tbtdl tdlID    DEFAULT     n   ALTER TABLE ONLY public.tbtdl ALTER COLUMN "tdlID" SET DEFAULT nextval('public."tbtdl_tdlID_seq"'::regclass);
 <   ALTER TABLE public.tbtdl ALTER COLUMN "tdlID" DROP DEFAULT;
       public          postgres    false    215    216    216            �          0    16408    tbCateg 
   TABLE DATA           E   COPY public."tbCateg" ("catID", "categDesc", "isActive") FROM stdin;
    public          postgres    false    217   0       �          0    16417    tbstatus 
   TABLE DATA           D   COPY public.tbstatus ("statID", "statDesc", "isActive") FROM stdin;
    public          postgres    false    219   x       �          0    16399    tbtdl 
   TABLE DATA           W   COPY public.tbtdl ("tdlID", "tdDesc", "Sdate", "Edate", "statID", "catID") FROM stdin;
    public          postgres    false    216   �                   0    0    tbstatus_statID_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public."tbstatus_statID_seq"', 1, false);
          public          postgres    false    218                       0    0    tbtdl_tdlID_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public."tbtdl_tdlID_seq"', 4, true);
          public          postgres    false    215            `           2606    16415    tbCateg tbCateg_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public."tbCateg"
    ADD CONSTRAINT "tbCateg_pkey" PRIMARY KEY ("catID");
 B   ALTER TABLE ONLY public."tbCateg" DROP CONSTRAINT "tbCateg_pkey";
       public            postgres    false    217            b           2606    16425    tbstatus tbstatus_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.tbstatus
    ADD CONSTRAINT tbstatus_pkey PRIMARY KEY ("statID");
 @   ALTER TABLE ONLY public.tbstatus DROP CONSTRAINT tbstatus_pkey;
       public            postgres    false    219            ^           2606    16407    tbtdl tbtdl_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.tbtdl
    ADD CONSTRAINT tbtdl_pkey PRIMARY KEY ("tdlID");
 :   ALTER TABLE ONLY public.tbtdl DROP CONSTRAINT tbtdl_pkey;
       public            postgres    false    216            �   8   x�3�(�O/J����K�4�2�N����2�9�󋲁N���Ԣb 3F��� ���      �   .   x�3�t���,�HM�4�2����u���Kr�9�Rs���1z\\\ J       �   ~   x�u�=�0@��>�/�*�`����Q5i��ޞ�Ulo����e�k�qni[)s�V[��I9�˳�=������Zi��:PH�ǻ�T.��䛦��~�d��KI�|��t0���_*�     