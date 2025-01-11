--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2 (Homebrew)
-- Dumped by pg_dump version 17.2 (Homebrew)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE hubcook;
--
-- Name: hubcook; Type: DATABASE; Schema: -; Owner: clement
--

CREATE DATABASE hubcook WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'C';


ALTER DATABASE hubcook OWNER TO clement;

\connect hubcook

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: role; Type: TABLE; Schema: public; Owner: clement
--

CREATE TABLE public.role (
    id integer NOT NULL,
    label character varying NOT NULL,
    is_activ boolean DEFAULT true NOT NULL
);


ALTER TABLE public.role OWNER TO clement;

--
-- Name: TABLE role; Type: COMMENT; Schema: public; Owner: clement
--

COMMENT ON TABLE public.role IS 'Contient les  différents rôles d''utilisateur dans une application';


--
-- Name: COLUMN role.label; Type: COMMENT; Schema: public; Owner: clement
--

COMMENT ON COLUMN public.role.label IS 'Nom du rôle';


--
-- Name: role_id_seq; Type: SEQUENCE; Schema: public; Owner: clement
--

CREATE SEQUENCE public.role_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.role_id_seq OWNER TO clement;

--
-- Name: role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: clement
--

ALTER SEQUENCE public.role_id_seq OWNED BY public.role.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: clement
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying NOT NULL,
    email character varying NOT NULL,
    password character varying NOT NULL
);


ALTER TABLE public.users OWNER TO clement;

--
-- Name: TABLE users; Type: COMMENT; Schema: public; Owner: clement
--

COMMENT ON TABLE public.users IS 'Table qui contient les utilisateurs de l''application';


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: clement
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO clement;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: clement
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: role id; Type: DEFAULT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.role ALTER COLUMN id SET DEFAULT nextval('public.role_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: clement
--



--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: clement
--



--
-- Name: role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: clement
--

SELECT pg_catalog.setval('public.role_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: clement
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- Name: role role_pk; Type: CONSTRAINT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.role
    ADD CONSTRAINT role_pk PRIMARY KEY (id);


--
-- Name: role role_unique; Type: CONSTRAINT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.role
    ADD CONSTRAINT role_unique UNIQUE (label);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: users users_unique; Type: CONSTRAINT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_unique UNIQUE (username);


--
-- Name: users users_unique_1; Type: CONSTRAINT; Schema: public; Owner: clement
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_unique_1 UNIQUE (email);


--
-- PostgreSQL database dump complete
--

